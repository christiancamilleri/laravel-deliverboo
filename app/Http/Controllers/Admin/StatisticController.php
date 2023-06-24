<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        if ($restaurant->user->id === Auth::id()) {

            // $yearOrders = Order::whereHas('products', function ($query) use ($restaurant) {
            //     $query->where('restaurant_id', $restaurant->id)->withTrashed();
            // })
            //     ->with('products')
            //     ->orderByDesc('created_at')
            //     ->get()
            //     ->groupBy(function ($order) {
            //         return $order->created_at->format('Y'); // Raggruppa per anno 
            //     });

                $orders = Order::whereHas('products', function ($query) use ($restaurant) {
                    $query->where('restaurant_id', $restaurant->id)->withTrashed();
                })
                    ->with('products')

                    ->get()
                    ->groupBy(function ($order) {
                        return $order->created_at->format('Y-m'); // Raggruppa per anno 
                    });  
                    
                    $groupedOrders = [];
                        foreach ($orders as $yearMonth => $yearMonthOrders) {
                            list($year, $month) = explode('-', $yearMonth);
                            
                            if (!isset($groupedOrders[$year])) {
                                $groupedOrders[$year] = [];
                            }
                            
                            $groupedOrders[$year][$month] = $yearMonthOrders;
                        }

                    // $orders = Order::whereHas('products', function ($query) use ($restaurant) {
                    //     $query->where('restaurant_id', $restaurant->id)->withTrashed();
                    // })
                    //     ->with('products')
                    //     ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
                    //     ->get()
                    //     ->groupBy(function ($order) {
                    //         return $order->created_at->format('Y-m'); // Raggruppa per anno e mese
                    //     });
                
        // $orders = Order::whereHas('products', function ($query) use ($restaurant) {
        //     $query->where('restaurant_id', $restaurant->id)->withTrashed();
        // })->with('products')->orderByDesc('created_at')->get();

        } else {

            return view('unauthorized');
        }
        // dd($ordersgroup);
        // dd($orders);
        // return view('admin.statistics.index', compact('restaurant', 'yearOrders', 'monthOrders', 'orders'));

        return view('admin.statistics.index', compact('groupedOrders'));

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
