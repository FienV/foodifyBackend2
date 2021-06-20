<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Dish;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\MollieController;
use RealRashid\SweetAlert\Facades\Alert;
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

Route::get('/signup', 'ClientController@Create');
Route::post('/signup', 'ClientController@Store');

Route::get('/restaurant', 'RestaurantController@index');

Route::get('/menu/{id}', 'DishController@detail');

Route::get('/affirmation', 'OrderController@create');
Route::post('/affirmation', 'OrderController@Store');
Route::get('/order/{id}', 'OrderController@index');
Route::get('/order/{id}/{resto_id}', 'OrderController@show');
Route::get('/cart', 'OrderController@cart');
Route::get('removecart/{id}', 'OrderController@removecart');

Route::get('/validation', function () {
  return view('validation');  
});

Route::get('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('payment-success',[MollieController::Class, 'paymentSuccess'])->name('payment.success');

Route::get('/contact', 'ContactController@Create');
Route::post('/contact', 'ContactController@Store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




