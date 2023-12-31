<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use DateInterval;
use DateTime;
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

            $orders = Order::whereHas('products', function ($query) use ($restaurant) {
                $query->where('restaurant_id', $restaurant->id)->where('status', 1)->withTrashed();
            })
                ->orderBy('created_at')
                ->get()
                ->groupBy(function ($order) {
                    return $order->created_at;
                });

            $groupedOrders = [];
            foreach ($orders as $dateString => $order) {
                $date = new DateTime($dateString);

                $year = $date->format('Y');
                $month = $date->format('m');

                $oneYearAgo = new DateTime();
                $groupedOrders[$year][$month] = $order;
            }
        } else {

            return view('unauthorized');
        }

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
