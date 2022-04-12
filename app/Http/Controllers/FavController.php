<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\FavoritesModel;

class FavController extends Controller
{


    public function addFav(Request $request) {
        $user_id = 1;
        $place_id = $request->place_id;
        $error = true;

        if (FavoritesModel::where('favorite_place', '=', $place_id)->count() > 0) {

            return $error;

        }else {
            $place = array('favorite_place' => $place_id, 'favorite_user' => $user_id);
            DB::table('favorites') -> insert($place);
    
            $fav_list = DB::select('SELECT * 
            FROM favorites join places 
            on favorites.favorite_place = places.place_id 
            WHERE favorite_user = 1 
            ORDER BY favorites.favorite_id DESC LIMIT 4');
    
            return $fav_list;
        }

    }
}
