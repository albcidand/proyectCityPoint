<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SevillaController extends Controller
{
    public function showAll() {
        $sevillaPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%sevilla%"');

        return view('sevilla.index', ['sevillaPlaces' => $sevillaPlaces]);
    }
}
