<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
use App\Models\Type;
use App\Models\City;
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
        return view('affirmation', compact('cities', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $validate = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city_id' => 'required',
            'type_id'=>'required',
            'address' => 'required',
        ]);

       
        $order = Order::Create(
            
            // Add time and date to the DB with carbon helper
            [
              'email' => $request->email,
              'name' => $request->name,
              'phone' => $request->phone,
              'city_id' => $request->city_id,
              'type_id' => $request->type_id,
              'address' => $request->address,
              'date' => \Carbon\Carbon::now()
            ]
        );  

        // Store in pivot table - first get latest order
        $latest = \App\Models\Order::latest()->first();
        // Get the dishes from the session array
        $orders = \App\Models\Dish::whereIn('id', session('dishes'))->get();
        foreach ($orders as $order) {
        $latest->dish()->attach($order->id);
        }


        return redirect('/mollie-payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
   
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


    

}
