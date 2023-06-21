<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function createPaymentToken(Request $request)
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
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        $formData = $request->all();
        $nonce = $formData['payment_method_nonce'];
        $amount = $formData['amount'];

        // Effettua il pagamento utilizzando il nonce della carta di credito
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

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
}
