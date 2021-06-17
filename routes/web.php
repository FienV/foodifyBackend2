<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Dish;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\MollieController;
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
  
Route::get('/order/{id}', 'OrderController@index');
Route::post('/order/{id}', 'OrderController@Store');
//route::get('/order/{id}', 'OrderController@show');

//Route::delete('/order/{id}/edit', 'OrderController@Edit');


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

Route::get('/order/{id}', function ($id) {
  
  session()->push('dishes', $id);
  //print_r(session('dishes'));
 

});

Route::get('/restaurant', 'RestaurantController@index');

Route::get('/cart', function () {
 
  // Get the dishes from the session array
  $orders = App\Models\Dish::whereIn('id', session('dishes'))->get();
  $types = App\Models\Type::get();
  return view('cart', compact('orders','types'));

  
});


Route::get('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('payment-success',[MollieController::Class, 'paymentSuccess'])->name('payment.success');


