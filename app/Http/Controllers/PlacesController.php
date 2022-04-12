<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PlacesRepository;
use DB;

class PlacesController extends Controller
{
    public function __construct(PlacesRepository $placesRepository){
        $this -> placesRepository = $placesRepository;
    }

    public function showAll(){
        $places = $this -> placesRepository -> all();
        $randomPlaces = $this -> placesRepository -> random();
        $favoritePlaces = DB::select('SELECT * 
        FROM favorites join places 
        on favorites.favorite_place = places.place_id 
        WHERE favorite_user = 1
        ORDER BY favorites.favorite_id DESC LIMIT 4');

        return view('home.index', [
            'places' => $places,
            'randomPlaces' => $randomPlaces,
            'favoritePlaces' => $favoritePlaces
        ]);
    }
}
