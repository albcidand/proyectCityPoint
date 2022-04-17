<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LisbonController extends Controller
{
    public function showAll() {
        $lisbonPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%lisbon%"');

        return view('lisbon.index', ['lisbonPlaces' => $lisbonPlaces]);
    }
}
