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
    return view('home');
});

Route::get('/menu', function () {
    return view('menu');
 });

Route::get('/winkelmandje', function () {
    return view('winkelmandje');
 });

Route::get('/contact', function () {
    return view('contact');
    
 });

Route:: get('/api/city', function () {
    $api = City::get()->toJson();
    return $api;
});

Route::get('/signup', 'App\Http\Controllers\ClientController@Create');
Route::post('/signup', 'App\Http\Controllers\ClientController@Store');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
