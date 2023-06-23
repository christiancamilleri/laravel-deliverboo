<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;
use App\Models\Lead;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function createPaymentToken()
    {
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        // Genera un token del client Braintree
        $clientToken = $gateway->clientToken()->generate();

        return response()->json([
            'clientToken' => $clientToken,
        ]);
    }

    public function processPayment(Request $request)
    {
        $formData = $request->all();
        $validate = $this->validation($formData);
        
        if($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Campi mancanti',
                'errors' => $validate->errors(),
            ]);
        }

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        $formData = $request->all();
        $nonce = $formData['nonce'];
        $amount = $formData['amount'];

        // Effettua il pagamento utilizzando il nonce della carta di credito
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);
        
        $this->saveOrder($request, $result->success);
        
        
        if ($result->success) {
            // Il pagamento è andato a buon fine
            return response()->json([
                'success' => true,
                'message' => 'Pagamento effettuato con successo.',
            ]);
        } else {
            // Il pagamento ha fallito
            $error = $result->message;
            return response()->json([
                'success' => false,
                'message' => 'Errore durante il pagamento: ' . $error,
            ]);
        }
    }

    private function saveOrder($request, $success) {
        $newOrder = new Order();

        $newOrder->name = $request->input('user.name');
        $newOrder->email = $request->input('user.email');
        $newOrder->phone = $request->input('user.phone');
        $newOrder->postal_code = $request->input('user.postal_code');
        $newOrder->address = $request->input('user.address');
        $newOrder->optional_info = $request->input('user.optional_info');
        $newOrder->total_price = $request->input('amount');
        $newOrder->status = $success;

        $newOrder->save();

        $cartItems = $request->input('cartItems');
        foreach ($cartItems as $item) {
            $newOrder->products()->attach($item['product']['id'], ['quantity' => $item['quantity']]);
        }

        if ($success) {
            $data = [
                'name' => $newOrder->name,
                'address' => $newOrder->address,
                'postal_code' => $newOrder->postal_code,
                'email' => $newOrder->email,
                'phone' => $newOrder->phone,
                'cartItems' => $cartItems,
                'total_price' => $newOrder->total_price,
                'optional_info' => $newOrder->optional_info,
                'content' => 'Ordine effettuato con successo',
            ];

            $new_lead = new Lead();
            $new_lead->fill($data);

            Mail::to($newOrder->email)->send(new NewContact($new_lead));

            $data = [
                'name' => $newOrder->name,
                'address' => $newOrder->address,
                'postal_code' => $newOrder->postal_code,
                'email' => $newOrder->email,
                'phone' => $newOrder->phone,
                'cartItems' =>   $cartItems,
                'total_price' => $newOrder->total_price,
                'optional_info' => $newOrder->optional_info,
                'content' => 'Ordine effettuato con successo',
            ];

            $new_lead = new Lead();
            $new_lead->fill($data);

            Mail::to($newOrder->products[0]->restaurant->user->email)->send(new NewContact($new_lead));
        }
    }
    
    private function validation($formData) {
        $validator = Validator::make($formData, [
            'user.name' => 'required|max:100',
            'user.address' => 'required|max:255',
            'user.postal_code' => 'required|regex:/^[0-9]{5}$/',
            'user.phone' => 'required',
            'user.email' => 'required|email',
            'user.optional_info' => 'max:65535'
        ]);

        return $validator;
    }
}
