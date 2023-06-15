<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $userName = $user->name;
        
        $restaurant = $user->restaurant;


        return view('admin.restaurants.index', compact('restaurant', 'userName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typologies = Typology::all();

        return view('admin.restaurants.create', compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Preleviamo i formData dalla request
        $formData = $request->all();
        // Validiamo i dati inseriti dall'utente nel form
        $this->validator($formData);

        // Creiamo un nuovo oggetto Restaurant
        $newRestaurant = new Restaurant();

        // Controlliamo se nel form è stato caricato un file per la cover
        if($request->hasFile('cover')) {
            // In caso affermativo:

            // Carico il file sul server e mi salvo il percorso
            $path = Storage::put('restaurants_covers', $request->cover);
            // Inserisco il percorso nell'apposita colonna di restaurant
            // $newRestaurant->cover = $path;
            $formData['cover'] = $path;
        }
        
        // Controlliamo se nel form è stato caricato un file per il logo
        if($request->hasFile('logo')) {
            // In caso affermativo:

            // Carico il file sul server e mi salvo il percorso
            $path = Storage::put('restaurants_logos', $request->logo);
            // Inserisco il percorso nell'apposita colonna di restaurant
            // $newRestaurant->logo = $path;
            $formData['logo'] = $path;
        };

        
        // Riempiamo il nuovo ristorante con i dati fillable ricevuti dal form
        $newRestaurant->fill($formData);
        
        // Calcoliamo lo slug con il metodo statico della classe Str
        // $newRestaurant->slug = Str::slug($newRestaurant->name);
        $newRestaurant->slug = Str::slug($newRestaurant->name);
        $duplicate = count(Restaurant::where('name', $newRestaurant->name)->get());
        if($duplicate){
            $newRestaurant->slug .= '-' . $duplicate;
        }
        
        // Preleviamo lo user_id dell'utente loggato al momento della chiamata
        $newRestaurant->user_id = Auth::id();

        // Salvo nel database il nuovo restaurant con tutte le info
        $newRestaurant->save();

        // Controllo se le typologies esistono effettivamente nel database
        if(array_key_exists('typologies', $formData)) {
            // In caso affermativo:

            // Creo un campo nella tabella pivot di tipo [$restaurant->id, $typology->id] per ogni typologies selezionata nel form
            $newRestaurant->typologies()->attach($formData['typologies']);
        }
        
        // Reindirizzo alla show del restaurant appena creato
        // return redirect()->route('admin.restaurants.show', $newRestaurant);
        return to_route('admin.restaurants.show', $newRestaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {

        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $typologies = Typology::all();

        return view('admin.restaurants.edit', compact('restaurant', 'typologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        // Preleviamo i formData dalla request
        $formData = $request->all();
        // Validiamo i dati inseriti dall'utente nel form
        $this->validator($formData);
    
        // Controlliamo se nel form è stato caricato un file per la cover
        if($request->hasFile('cover')) {
            // In caso affermativo:

            // Se era presente un'immagine nel database
            if($restaurant->cover){
                
                // cancello la vecchia immagine "cover"
                Storage::delete($restaurant->cover);
            }

            // Carico il file sul server e mi salvo il percorso
            $path = Storage::put('restaurants_covers', $request->cover);
            
            // Inserisco il percorso nell'apposita colonna di restaurant
            // $restaurant->cover = $path;
            $formData['cover'] = $path;
        }
        
        // Controlliamo se nel form è stato caricato un file per il logo
        if($request->hasFile('logo')) {
            // In caso affermativo:

            // Se era presente un'immagine nel database
            if($restaurant->logo){
                Storage::delete($restaurant->logo);
            }
            // Carico il file sul server e mi salvo il percorso
            $path = Storage::put('restaurants_logos', $request->logo);
            // Inserisco il percorso nell'apposita colonna di restaurant
            // $restaurant->logo = $path;
            $formData['logo'] = $path;
        };
    
        // Calcoliamo lo slug con il metodo statico della classe Str
        $restaurant->slug = Str::slug($formData['name']);
        $duplicate = count(Restaurant::where('name', $formData['name'])->get());

        if($duplicate){
            $restaurant->slug .= '-' . $duplicate;
        }
        
        // Salvo nel database il nuovo restaurant con tutte le info
        $restaurant->update($formData);
    
        // Controllo se le typologies esistono effettivamente nel database
        if(array_key_exists('typologies', $formData)) { 
    
            // Creo un campo nella tabella pivot di tipo [$restaurant->id, $typology->id] per ogni typologies selezionata nel form
            $restaurant->typologies()->sync($formData['typologies']);
        }else {
            $restaurant->typologies()->detach();
        }
        
        // Reindirizzo alla show del restaurant appena creato
        // return redirect()->route('admin.restaurants.show', $newRestaurant);
        return to_route('admin.restaurants.show', $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant->cover) {

            
            Storage::delete($restaurant->cover);
        }
        
        if($restaurant->logo) {

            Storage::delete($restaurant->logo);
        }

        $restaurant->delete();

        return to_route('admin.restaurants.index');
    }
    
    
    private function validator($formData) {

        $validator = Validator::make($formData, [
            
            'name' => 'required|max:100',
            'address' => 'required|max:255',
            'postal_code' => 'required|size:5',
            'vat_number' => 'required|size:13',
            'logo' => 'image|max:4096|nullable',
            'cover' => 'image|max:4096|nullable',
            'typologies' => 'exists:typologies,id',

        ],[

            'name.required' => 'Devi inserire il nome del ristorante',
            'name.max' => 'Il nome del ristorante deve essere al massimo di 100 caratteri',
            'address.required' => 'Campo obbligatorio',
            'address.max' => 'Questo campo non deve superare i 255 caratteri',
            'postal_code.required' => 'Campo obbligatorio',
            'postal_code.size' => 'Il codice postale deve essere di 5 caratteri',
            'vat_number.require' => 'Campo obbligatorio',
            'vat_number.size' => 'La partita Iva deve essere di 13 caratteri',
            'logo.image' => 'Il file deve esser un immagine',
            'logo.max' => 'Il file non può essere più grande di 4MB',
            'cover.image' => 'Il file deve esser un immagine',
            'cover.max' => 'La dimensione del file è superiore al limite (4096 bytes)',
            'typologies.extist' => 'La tipologia inserita non esiste'

        ])->validate();

        return $validator;

    }
    
    }

