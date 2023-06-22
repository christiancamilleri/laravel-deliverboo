<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

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
            $query->where('restaurant_id', $restaurant->id);
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

        // $newOrder->name = $formData['user.name'];
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
        return view('admin.orders.show', compact('restaurant', 'order', 'products'));
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
