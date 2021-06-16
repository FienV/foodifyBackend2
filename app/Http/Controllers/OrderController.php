<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
use App\Models\Type;
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
   


        // $total = collect ($request->price)->sum();
        //dd($total, $orders);
        //$total = collect($order->Price)->sum();


        //deletefuction for x button 
        //session()->forget('dish', $id) ;

       
        
        return view('cart',compact('orders', 'types','totalprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        /*$validate = request()->validate([
            'type_id' => 'required',
        ]);
    
        if(Auth::check()) {

            return view('validation', compact('orders'));

        } else {
            return view ('signup');
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$student->course()->attach(request('course')); 
      
      if(Auth::check()) {
        $key = $order->dish()->attach(request('dish')); 

        dd($key);
        $order = Order::create (

        [

        'type_id' => $request->type_id,

        'user_id' => Auth::user()->getKey(),

        ]

        );



        return view('mollie-payment');



        } else {

        return view ('signup');

        }
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
