<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DeleteController extends Controller
{
    public function deleteFav(Request $request){

        DB::delete('DELETE favorites 
        from favorites join users 
        on favorites.favorite_user = users.user_id 
        WHERE users.user_id = 1 AND favorites.favorite_place = ?', [$request->place_id]);

        $fav_list = DB::select('SELECT * 
        FROM favorites join places 
        on favorites.favorite_place = places.place_id 
        WHERE favorite_user = 1
        ORDER BY favorites.favorite_id DESC LIMIT 4');

        return $fav_list;
    }
}
