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

/*  landing route */

Route::get('/', function () {
    return view('landing.index');
});

/* home route */

Route::get('/home', 'App\Http\Controllers\PlacesController@showAll');

/* add favorite route */

Route::get('/add_fav', 'App\Http\Controllers\FavController@addFav')->name('add_fav_place');

/* delete favorite route */

Route::get('/delete_fav', 'App\Http\Controllers\DeleteController@deleteFav')->name('delete_fav_place');

/* filter route */

Route::get('/monuments', 'App\Http\Controllers\CategoriesController@showMonuments');
Route::get('/nature', 'App\Http\Controllers\CategoriesController@showNature');
Route::get('/food', 'App\Http\Controllers\CategoriesController@showFood');
Route::get('/secret', 'App\Http\Controllers\CategoriesController@showSecret');