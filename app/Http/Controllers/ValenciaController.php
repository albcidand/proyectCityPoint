<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ValenciaController extends Controller
{
    public function showAll() {
        $valenciaPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%valencia%"');

        return view('valencia.index', ['valenciaPlaces' => $valenciaPlaces]);
    }
}
