<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MadridController extends Controller
{
    public function showAll() {
        $madridPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%madrid%"');

        return view('madrid.index', ['madridPlaces' => $madridPlaces]);
    }
}
