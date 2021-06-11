<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function detail($id) {
        $orders = Order::with('dish')->where('user_id', $id)->get();
        return view('chart',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = Dish:: find($id);
        if(!$dish) {
            abort(404);
        }    

        $order = session() -> get ('order'); 
        
        //if cart is empty then this is the first product to be added

        if(!$order){

            $order = [ 
                $id => [ 
                    'name' => $dish -> name, 
                    'description' => $dish -> description,
                    'price' =>$dish-> price,
                    'quantitiy' => 1                    
                ]
            ];

            session() -> put ('order', $order);

            return redirect()-> back()-> with('succes', 'Product added to cart succesfully!');
        }

        // if cart not empty then check if this product exists, then increment quantity

        if (isset($order[$id])){
            $order[$id][ 'quantitiy']++;
            
            session() -> put ('order', $order);

            return redirect()-> back()-> with('succes', 'product added to cart succesfully!');
        }


        // if item doesnt exist in cart, then add to cart with quantity = 1 
        $order[$id] = [
            'name' => $dish -> name,
            'description' => $dish -> description,
            'price' =>$dish-> price,
            'quantitiy' => 1
        ];

        session() -> put ('order', $order);

        return redirect()-> back()-> with('succes', 'product added to cart succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
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
