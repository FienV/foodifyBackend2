<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
use App\Models\Type;
use App\Models\City;
use App\Models\Hour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        session()->push('dishes', $id);
        $orders = Dish::find(session('dishes'));
        $types = Type::all();
        
        $totalprice= "['']";
       
        return view('cart',compact('orders', 'types','totalprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $types = Type::all();
        $hours = Hour::all();
        return view('affirmation', compact('cities', 'types', 'hours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //validatie verplichte velden
        $validate = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city_id' => 'required',
            'type_id'=>'required',
            'address' => 'required',
            'date'=>'required|date',
            'hour_id' => 'required',
        ]);

       //storen in db 
        $order = Order::Create(
            
            [
              'email' => $request->email,
              'name' => $request->name,
              'phone' => $request->phone,
              'city_id' => $request->city_id,
              'type_id' => $request->type_id,
              'address' => $request->address,
              'date' => $request->date,
              'hour_id' => $request->hour_id,
            ]
        );  
        return redirect('/mollie-payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id,$resto_id)
    {
        session()->push('dishes', $id);
        //print_r(session('dishes'));
        
        //return to the resto dishes
        //we retrieve the resto id from the view as it is eager loaded in the collection ($dish->restaurant->id)
        alert()->success('Gerecht toegevoegd aan winkelmandje');
        return redirect('/menu/'.$resto_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $request->session()->forget(['dish', $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function cart()
    {
        // check if cart session is set - if no items in cart redirect to empty cart
        if (session('dishes')) {
        // Get the dishes from the session array
        $orders = Dish::whereIn('id', session('dishes'))->get();
        // Get the types
        $types = Type::get();
        return view('cart', compact('orders','types'));
            } else {
        return view('nocart');
        }   
    }

    public function removecart($id)
    { 
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
    }
}
