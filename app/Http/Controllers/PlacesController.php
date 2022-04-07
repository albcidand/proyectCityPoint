<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PlacesRepository;

class PlacesController extends Controller
{
    public function __construct(PlacesRepository $placesRepository){
        $this -> placesRepository = $placesRepository;
    }

    public function showAll(){
        $places = $this -> placesRepository -> all();

        return view('home.index', [
            'places' => $places
        ]);
    }
}
