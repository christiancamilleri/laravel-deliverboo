<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        if ($restaurant->user->id === Auth::id()) {
            return view('admin.products.index', compact('restaurant'));
        } else {
            return view('unauthorized');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        if ($restaurant->user->id === Auth::id()) {
            return view('admin.products.create', compact('restaurant'));
        } else {
            return view('unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurant $restaurant)
    {
        $formData = $request->all();

        $formData['slug'] = Str::slug($formData['name']);

        $this->validator($formData, $restaurant->id);

        $newProduct = new Product();

        if ($request->hasFile('photo')) {
            $path = Storage::put('product_images', $request->photo);

            $formData['photo'] = $path;
        }

        $newProduct->fill($formData);

        if (array_key_exists('visible', $formData)) {
            $newProduct->visible = 1;
        } else {
            $newProduct->visible = 0;
        }

        $newProduct->slug = $formData['slug'];
        $newProduct->restaurant_id = $restaurant->id;
        $newProduct->save();

        return to_route('admin.restaurants.products.show', [$restaurant, $newProduct]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Product $product)
    {
        if ($restaurant->user->id === Auth::id()) {
            return view('admin.products.show', compact('restaurant', 'product'));
        } else {
            return view('unauthorized');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, Product $product)
    {
        if ($restaurant->user->id === Auth::id()) {
            return view('admin.products.edit', compact('restaurant', 'product'));
        } else {
            return view('unauthorized');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant, Product $product)
    {
        $formData = $request->all();

        $formData['slug'] = Str::slug($formData['name']);

        $this->validator($formData, $restaurant->id, $product->id);

        if ($request->has('delete_photo') && $formData['delete_photo'] == 'on' && $product->photo) {
            // cancello la vecchia immagine "cover"
            Storage::delete($product->photo);
            $formData['photo'] = '';
        } else if ($request->hasFile('photo')) {

            if ($product->photo) {
                Storage::delete($product->photo);
            }

            $path = Storage::put('product_images', $request->photo);

            $formData['photo'] = $path;
        }

        if (array_key_exists('visible', $formData)) {
            $product->visible = 1;
        } else {
            $product->visible = 0;
        }

        $product->slug = $formData['slug'];

        $product->update($formData);

        return to_route('admin.restaurants.products.show', [$restaurant, $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Product $product)
    {
        if ($product->photo) {
            Storage::delete($product->photo);
        }

        $product->delete();

        return to_route('admin.restaurants.products.index', $restaurant);
    }

    private function validator($formData, $restaurantId, $productId = null)
    {
        $rule = Rule::unique('products')->where(function ($query) use ($restaurantId) {
            return $query->where('restaurant_id', $restaurantId);
        });

        if ($productId) {
            $rule->ignore($productId);
        };

        $validator = Validator::make($formData, [

            'name' => 'required|max:100',
            'description' => 'required|max:65535',
            'price' => 'required|numeric|max:999.99|min:0',
            'photo' => 'image|max:4096|nullable',
            'slug' => $rule,
        ], [
            'slug.*' => 'Esiste già un prodotto con questo nome',
        ])->validate();

        return $validator;
    }
}
