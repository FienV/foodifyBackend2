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

Route::get('/contact', function () {
    return view('contact');  
});

Route::get('/validation', function () {
  return view('validation');  
});

Route::get('/affirmation', 'OrderController@create');

Route::get('/signup', 'ClientController@Create');
Route::post('/signup', 'ClientController@Store');

Route::get('/contact', 'ContactController@Create');
Route::post('/contact', 'ContactController@Store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/menu/{id}', 'DishController@detail');

Route::get('/order/{id}/{resto_id}', function ($id,$resto_id) {
  
  session()->push('dishes', $id);
  return redirect('/menu/'.$resto_id);
});

Route::get('/restaurant', 'RestaurantController@index');

// show items in cart method
Route::get('/cart', function () {
  // check if cart session is set - if no items in cart redirect to empty cart
  if (session('dishes')) {
       // Get the dishes from the session array
      $orders = App\Models\Dish::whereIn('id', session('dishes'))->get();
      // Get the types
      $types = App\Models\Type::get();
      return view('cart', compact('orders','types'));
  } else {
      return view('nocart');
  }
});

// Delete item from cart method
Route::get('removecart/{id}', function($id) {
  
  //iterate cart session and look for id, if found unset it...
  $cart[] = session('dishes');
  $i=0;
  foreach ($cart as $index => $product) {
    if ($product[$i] == $id) {
       unset($cart[$i]);
     }
  }
  // reset the correct values for the cart without the removed items
  session(['dishes' => $cart]);

  return redirect('/cart');
});


Route::get('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('payment-success',[MollieController::Class, 'paymentSuccess'])->name('payment.success');


