<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function dashboard()
    {
        // $user = Auth::user();
        // $restaurant = $user->restaurant;

        // if ($restaurant) {

        //     // return view('admin.index', compact('restaurant'));
        //     return redirect()->route('admin.restaurants.index', $restaurant);
        // } else {

        //     return redirect()->route('admin.restaurants.create');
        // }
    }
}
