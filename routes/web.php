<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\Cart;
use App\Models\Order;
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

Route::get('/order', 'OrderController@detail');
Route::post('/order', 'OrderController@store');



Route::get('/contact', function () {
    return view('contact');
    
});

Route::get('/detailsorder/{id}', function ($id) {
  $result = App\Models\Order::with('dish','user')->where('id',$id)->firstOrFail();
  //dd($result);
  foreach ($result->dish as $restoid){
    echo $restoid->restaurant_id."<hr>";
  }
  
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

Route::get('/menu/{id}', 'DishController@detail');


Route::get('/restaurant', 'RestaurantController@index');
