<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Typology;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $requestData = $request->all();

        if ($request->has('typology_ids') && $requestData['typology_ids']) {
            $typology_ids = $requestData['typology_ids'];

            $restaurants = Restaurant::whereHas('typologies', function ($query) use ($typology_ids) {
                $query->whereIn('typology_id', $typology_ids);
            }, '=', count($typology_ids))->with('typologies')->get();
        } else {
            $restaurants = Restaurant::with('typologies')->get();
        }

        $typologies = Typology::all();

        if (count($restaurants)) {
            return response()->json([
                'success' => true,
                'results' => $restaurants,
                'allTypologies' => $typologies
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun ristorante trovato',
                'allTypologies' => $typologies,
            ]);
        }
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with(['typologies', 'products' => function ($query) {
            $query->where('visible', true)->orderBy('name');
        }])->first();

        if ($restaurant) {
            return response()->json([
                'success' => true,
                'restaurant' => $restaurant,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'nessun ristorante trovato'
            ]);
        }
    }
}
