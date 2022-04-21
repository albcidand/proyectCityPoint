<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FavoriteListController extends Controller
{

    public function showAllFavorites(){
        $favoritePlaces = DB::select('SELECT * 
        FROM favorites join places 
        on favorites.favorite_place = places.place_id 
        WHERE favorite_user = 1
        ORDER BY favorites.favorite_id DESC');

        return view('favorites.index', [
            'favoritePlaces' => $favoritePlaces
        ]);
    }
}
