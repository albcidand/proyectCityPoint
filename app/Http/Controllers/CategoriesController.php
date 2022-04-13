<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoriesController extends Controller
{
    /* monuments filter */

    public function showMonuments () {
        $monuments = DB::select('SELECT * FROM places WHERE place_category LIKE "%Monument%"');

        return view('monuments.index', ['monuments' => $monuments]);
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
