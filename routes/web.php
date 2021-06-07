<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
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

// Route::get('/menu', function () {
//     return view('menu');
//  });

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@Store');

Route::get('/contact', function () {
    return view('contact');
    
 });

Route:: get('/api/city', function () {
    $api = City::get()->toJson();
    return $api;
});

Route::get('/signup', 'ClientController@Create');
Route::post('/signup', 'ClientController@Store');

Route::get('/contact', 'ContactController@Create');
Route::post('/contact', 'ContactController@Store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/menu', 'DishController@index');
