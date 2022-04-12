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

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/home', 'App\Http\Controllers\PlacesController@showAll');

Route::get('/add_fav', 'App\Http\Controllers\FavController@addFav')->name('add_fav_place');

Route::get('/delete_fav', 'App\Http\Controllers\DeleteController@deleteFav')->name('delete_fav_place');