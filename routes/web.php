<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*  ruta para la landing */

Route::get('/', function () {
    return view('landing.index');
});

/* ruta para la home */

Route::get('/home', 'App\Http\Controllers\PlacesController@showAll');

/* ruta para añadir favoritos */

Route::get('/add_fav', 'App\Http\Controllers\FavController@addFav')->name('add_fav_place');

/* ruta para borrar favoritos */

Route::get('/delete_fav', 'App\Http\Controllers\DeleteController@deleteFav')->name('delete_fav_place');

/* rutas para los filtros de categorías de la home */

Route::get('/monuments', 'App\Http\Controllers\CategoriesController@showMonuments');
Route::get('/nature', 'App\Http\Controllers\CategoriesController@showNature');
Route::get('/food', 'App\Http\Controllers\CategoriesController@showFood');
Route::get('/secret', 'App\Http\Controllers\CategoriesController@showSecret');

/* rutas para el filtro de ciudad de la home */

Route::get('/sevilla', 'App\Http\Controllers\CityController@showSevilla');
Route::get('/madrid', 'App\Http\Controllers\CityController@showMadrid');
Route::get('/valencia', 'App\Http\Controllers\CityController@showValencia');
Route::get('/lisbon', 'App\Http\Controllers\CityController@showLisbon');

/* rutas para los filtros de categorías de cada ciudad */

Route::get('/lisbon_category', 'App\Http\Controllers\CityController@showCategoryLisbon');
Route::get('/sevilla_category', 'App\Http\Controllers\CityController@showCategorySevilla');
Route::get('/valencia_category', 'App\Http\Controllers\CityController@showCategoryValencia');
Route::get('/madrid_category', 'App\Http\Controllers\CityController@showCategoryMadrid');

/* ruta para la página de favoritos */

Route::get('/favorites', 'App\Http\Controllers\FavoriteListController@showAllFavorites');