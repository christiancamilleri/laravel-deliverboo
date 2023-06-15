<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $products = $restaurant->products;

        return view('admin.products.index', compact('restaurant', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        return view('admin.products.create', compact('restaurant'));
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

        $this->validator($formData);

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

        $newProduct->slug = Str::slug($newProduct->name);

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
        return view('admin.products.show', compact('restaurant', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, Product $product)
    {
        return view('admin.products.edit', compact('restaurant', 'product'));
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
        
        $this->validator($formData);
        // dd($request);
        
        if ($request->hasFile('photo')) {

            if($product->photo) {
                Storage::delete($product->photo);
            }

            $path = Storage::put('product_images', $request->photo);

            $formData['photo'] = $path;
        }

        $product->fill($formData);

        if (array_key_exists('visible', $formData)) {
            $product->visible = 1;
        } else {
            $product->visible = 0;
        }

        $product->slug = Str::slug($formData['name']);

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
        if($product->photo){
            Storage::delete($product->photo);
        }
        
        $product->delete();

        return to_route('admin.restaurants.products.index', $restaurant);
    }

    private function validator($formData) {

        $validator = Validator::make($formData, [

            'name' => 'required|max:100',
            'description' => 'required|max:65535',
            'price' => 'required|numeric|max:999.99|min:0.01',
            'photo' => 'image|max:4096|nullable',
        ],[
            'name.required' => 'Devi inserire il nome del prodotto',
            'name.max' => 'Il nome del prodotto deve essere al massimo di 100 caratteri',
            'description.required' => 'Devi inserire una descrizione del prodotto',
            'description.max' => 'La descrizione non deve superare i 65535 caratteri',
            'price.required' => 'Inserisci un prezzo',
            'price.numeric' => 'Puoi inserire solo caratteri numerici',
            'price.min' => 'Il prezzo minimo è :min',
            'price.max' => 'Il prezzo massimo è :max',
            'photo.image' => 'Il file deve esser un immagine',
            'photo.max' => 'Il file non può essere più grande di 4MB',

        ])->validate();

        return $validator;

    }
}
