<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Dish;
use Illuminate\Http\Request;
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

Route::get('/order/{id}', function ($id) {
    session()->push('dishes', $id);
  });

  Route::get('/cart', 'OrderController@index');
  Route::post('/cart', 'OrderController@Store');


Route::get('/contact', function () {
    return view('contact');  
});

Route::get('/validation', function () {
  return view('validation');  
});

Route::get('/signup', 'ClientController@Create');
Route::post('/signup', 'ClientController@Store');

Route::get('/contact', 'ContactController@Create');
Route::post('/contact', 'ContactController@Store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/menu/{id}', 'DishController@detail');


Route::get('/restaurant', 'RestaurantController@index');
