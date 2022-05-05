<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; /* usamos la base de datos */

class CityController extends Controller
{
    /* esta función devuelve la vista lisbon y le pasa los lugares de Lisboa en la variable $lisbonPlaces */

    public function showLisbon() {
        $lisbonPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%lisbon%"'); /* seleccionamos los lugares de la tabla places en los que la columna place_city contiene la palabra lisbon */

        return view('lisbon.index', ['lisbonPlaces' => $lisbonPlaces]);
    }

    /* esta función devuelve la vista madrid y le pasa los lugares de Madrid en la variable $madridPlaces */

    public function showMadrid() {
        $madridPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%madrid%"'); /* seleccionamos los lugares de la tabla places en los que la columna place_city contiene la palabra madrid */

        return view('madrid.index', ['madridPlaces' => $madridPlaces]);
    }

    /* esta función devuelve la vista sevilla y le pasa los lugares de Sevilla en la variable $sevillaPlaces */

    public function showSevilla() {
        $sevillaPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%seville%"'); /* seleccionamos los lugares de la tabla places en los que la columna place_city contiene la palabra seville */

        return view('sevilla.index', ['sevillaPlaces' => $sevillaPlaces]);
    }

    /* esta función devuelve la vista lisbon y le pasa los lugares de Valencia en la variable $valenciaPlaces */

    public function showValencia() {
        $valenciaPlaces = DB::select('SELECT * FROM places WHERE place_city LIKE "%valencia%"'); /* seleccionamos los lugares de la tabla places en los que la columna place_city contiene la palabra valencia */

        return view('valencia.index', ['valenciaPlaces' => $valenciaPlaces]);
    }

    /* estas funciones dan la funcionalidad de filtro a los botones de categoría en la vista de cada ciudad */

    public function showCategoryLisbon(Request $request) {

        /* esta función recibe el parámetro category desde el front (el value de los botones de categoría) */
    
        $category = DB::table('places')->select('places.*')->where('place_city', 'like', '%lisbon%')->where('place_category', 'like', '%'.$request->category.'%')->get();

        /* usamos el valor del parámetro category para buscar en la tabla places los lugares con esa categoría y que además son de lisboa*/

        return $category;
    }

    public function showCategorySevilla(Request $request) {
    
        $category = DB::table('places')->select('places.*')->where('place_city', 'like', '%seville%')->where('place_category', 'like', '%'.$request->category.'%')->get();

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
