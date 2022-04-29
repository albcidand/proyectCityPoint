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

    public function deleteFav(Request $request){

        DB::delete('DELETE favorites 
        from favorites join users 
        on favorites.favorite_user = users.user_id 
        WHERE users.user_id = 1 AND favorites.favorite_place = ?', [$request->place_id]);

        $fav_list = DB::select('SELECT * 
        FROM favorites join places 
        on favorites.favorite_place = places.place_id 
        WHERE favorite_user = 1
        ORDER BY favorites.favorite_id DESC');

        return $fav_list;
    }
}
