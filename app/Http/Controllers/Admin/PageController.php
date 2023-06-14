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
        $user_id = Auth::id();

        $restaurant = Restaurant::where('user_id', $user_id)->first();

        if ($restaurant) {
            return view('admin.dashboard', compact('restaurant'));
        } else {
            return redirect()->route('admin.restaurants.create');
        }
    }
}
