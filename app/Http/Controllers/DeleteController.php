<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; /* usamos la base de datos */

class DeleteController extends Controller
{

    /* esta función recibe una id desde el front y elimina el lugar de la tabla favorites de la base de datos */

    public function deleteFav(Request $request){

        DB::delete('DELETE favorites 
        from favorites join users 
        on favorites.favorite_user = users.user_id 
        WHERE users.user_id = 1 AND favorites.favorite_place = ?', [$request->place_id]); /* eliminamos el lugar con la id que le pasamos desde el front */

        $fav_list = DB::select('SELECT * 
        FROM favorites join places 
        on favorites.favorite_place = places.place_id 
        WHERE favorite_user = 1
        ORDER BY favorites.favorite_id DESC LIMIT 4'); /* seleccionamos los lugares favoritos del usuario (ordenados de forma descendiente y con un límite de 4 para que aparezcan solo los 4 últimos) y los guardamos en la variable que luego devolvemos como respuesta */

        return $fav_list;
    }
}
