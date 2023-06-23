<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $orders = Order::whereHas('products', function ($query) use ($restaurant) {
            $query->where('restaurant_id', $restaurant->id)->withTrashed();
        })->with('products')->orderByDesc('created_at')->get();

        return view('admin.orders.index', compact('restaurant', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $success)
    {
        $newOrder = new Order();

        $newOrder->name = $request->input('user.name');
        $newOrder->email = $request->input('user.email');
        $newOrder->postal_code = $request->input('user.postalCode');
        $newOrder->address = $request->input('user.address');
        $newOrder->optional_info = $request->input('user.optionalInfo');
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
                'email' => $newOrder->email,
                'content' => 'Ordine effettuato con successo',
            ];

            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();

            Mail::to($data['email'])->send(new NewContact($new_lead));

            $data = [
                'name' => $newOrder->products[0]->restaurant->name,
                'email' => $newOrder->products[0]->restaurant->user->email,
                'content' => 'Hai appena ricevuto un nuovo ordine',
            ];

            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();

            Mail::to($newOrder->products[0]->restaurant->user->email)->send(new NewContact($new_lead));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Order $order)
    {
        $products = $restaurant->products()->withTrashed()->get();
        return view('admin.orders.show', compact('restaurant', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
