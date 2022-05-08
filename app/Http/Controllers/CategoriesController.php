<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; /* usamos la base de datos */

class CategoriesController extends Controller
{

    /* estas funciones dan la funcionalidad de filtro a los botones de categoría en la vista home y devuelven la vista correspondiente */

    /* monuments filter */

    public function showMonuments () {

        $monuments = DB::select('SELECT * FROM places WHERE place_category LIKE "%Monument%"'); /* seleccionamos los lugares de la tabla places en los que la columna place_category contiene la palabra Monument y los guardamos en la variable */

        return view('monuments.index', ['monuments' => $monuments]); /* devolvemos la vista monuments pasándole los datos con la variable $monuments */
    }

    /* nature filter */

    public function showNature () {
        $nature = DB::select('SELECT * FROM places WHERE place_category LIKE "%Nature%"');

        return view('nature.index', ['nature' => $nature]);
    }

    /* food filter */

    public function showFood () {
        $food = DB::select('SELECT * FROM places WHERE place_category LIKE "%Food%"');

        return view('food.index', ['food' => $food]);
    }

    /* secret filter */

    public function showSecret () {
        $secret = DB::select('SELECT * FROM places WHERE place_category LIKE "%Secret%"');

        return view('secret.index', ['secret' => $secret]);
    }
}
