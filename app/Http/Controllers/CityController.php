<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CityController extends Controller
{
    /* show lisbon places */
    public function showLisbon() {
        $lisbonPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%lisbon%"');

        return view('lisbon.index', ['lisbonPlaces' => $lisbonPlaces]);
    }

    /* show madrid places */
    public function showMadrid() {
        $madridPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%madrid%"');

        return view('madrid.index', ['madridPlaces' => $madridPlaces]);
    }

    /* show sevilla places */
    public function showSevilla() {
        $sevillaPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%sevilla%"');

        return view('sevilla.index', ['sevillaPlaces' => $sevillaPlaces]);
    }

    /* show valencia places */
    public function showValencia() {
        $valenciaPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%valencia%"');

        return view('valencia.index', ['valenciaPlaces' => $valenciaPlaces]);
    }

    /* filtro botones de categoría en la vista de cada ciudad */
    public function showCategoryLisbon(Request $request) {
    
        $category = DB::table('places')->select('places.*')->where('place_city', 'like', '%lisbon%')->where('place_category', 'like', '%'.$request->category.'%')->get();

        return $category;
    }

    public function showCategorySevilla(Request $request) {
    
        $category = DB::table('places')->select('places.*')->where('place_city', 'like', '%sevilla%')->where('place_category', 'like', '%'.$request->category.'%')->get();

        return $category;
    }

    public function showCategoryValencia(Request $request) {
    
        $category = DB::table('places')->select('places.*')->where('place_city', 'like', '%valencia%')->where('place_category', 'like', '%'.$request->category.'%')->get();

        return $category;
    }

    public function showCategoryMadrid(Request $request) {
    
        $category = DB::table('places')->select('places.*')->where('place_city', 'like', '%madrid%')->where('place_category', 'like', '%'.$request->category.'%')->get();

        return $category;
    }
}
