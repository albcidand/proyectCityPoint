<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Repositories\PlacesRepository;

class FavController extends Controller
{

    /* public function __construct(PlacesRepository $placesRepository){
        $this -> placesRepository = $placesRepository;
    } */

    public function addFav(Request $request) {
        $user_id = 1;
        $place_id = $request->place_id;

        $place = array('favorite_place' => $place_id, 'favorite_user' => $user_id);
        DB::table('favorites') -> insert($place);

        $fav_list = DB::select('SELECT * FROM favorites join places on favorites.favorite_place = places.place_id WHERE favorite_user = 1');

        return $fav_list;
    }
}
