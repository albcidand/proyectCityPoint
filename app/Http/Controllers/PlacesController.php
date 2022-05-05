<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PlacesRepository; /* usamos el repositorio PlacesRepository para tener la base de datos completa y las funciones del repositorio */
use DB; /* usamos la base de datos */

class PlacesController extends Controller
{
    public function __construct(PlacesRepository $placesRepository){

        /* usamos la función construct para poder usar el repositorio */

        $this -> placesRepository = $placesRepository;
    }

    public function showAll(){

        /* esta función devuelve la vista home y le pasa las tres variables creadas */

        $places = $this -> placesRepository -> all(); /* variable que guarda todos los lugares que devuelve la función all() del repositorio (PlacesRepository.php) */
        $randomPlaces = $this -> placesRepository -> random(); /* variable que guarda todos los lugares que devuelve la función random() del repositorio (PlacesRepository.php) */
        $favoritePlaces = DB::select('SELECT * 
        FROM favorites join places 
        on favorites.favorite_place = places.place_id 
        WHERE favorite_user = 1
        ORDER BY favorites.favorite_id DESC LIMIT 4'); /* seleccionamos los lugares favoritos del usuario (ordenados de forma descendiente y con un límite de 4 para que aparezcan solo los 4 últimos) y los guardamos en la variable */

        return view('home.index', [
            'places' => $places,
            'randomPlaces' => $randomPlaces,
            'favoritePlaces' => $favoritePlaces
        ]);
    }
}
