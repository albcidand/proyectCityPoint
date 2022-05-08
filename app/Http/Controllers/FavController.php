<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; /* usamos la base de datos */
use App\Models\FavoritesModel; /* usamos el modelo FavoritesModel para tener la tabla favorites */

class FavController extends Controller
{

    /* esta función recibe una id desde el front y comprueba si existe en la tabla favorites de la base de datos */

    public function addFav(Request $request) {
        
        $user_id = 1; /* esta variable es para guardar la id del usuario, como actualmente no está hecha la funcionalidad de login de usuarios pongo una id fija, que servirá como usuario invitado */
        $place_id = $request->place_id; /* recibimos la id desde la petición ajax realizada en el front */
        $placeExists = 1; /* variable creada para devolverla como respuesta */

        if (FavoritesModel::where('favorite_place', '=', $place_id)->count() > 0) {

            /* comprobamos si el lugar existe ya en la base de datos y devolvemos la respuesta */
            return $placeExists;

        }else {

            /* si el lugar no existe en la base de datos lo insertamos */

            $place = array('favorite_place' => $place_id, 'favorite_user' => $user_id); /* variable donde recogemos los datos necesarios para insertar el lugar en la tabla favorites */
            DB::table('favorites') -> insert($place); /* lo insertamos */
    
            $fav_list = DB::select('SELECT * 
            FROM favorites join places 
            on favorites.favorite_place = places.place_id 
            WHERE favorite_user = 1 
            ORDER BY favorites.favorite_id DESC LIMIT 4'); /* seleccionamos los lugares favoritos del usuario (ordenados de forma descendiente y con un límite de 4 para que aparezcan solo los 4 últimos) y los guardamos en la variable que luego devolvemos como respuesta */
    
            return $fav_list;
        }

    }
}
