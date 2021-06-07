<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Dish;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::with('order')->get();
        return view('cart',compact('dishes'));
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
        //
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\CartController  $cartController
     * @return \Illuminate\Http\Response
     */
    public function show(CartController $cartController)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartController  $cartController
     * @return \Illuminate\Http\Response
     */
    public function edit(CartController $cartController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartController  $cartController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartController $cartController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartController  $cartController
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartController $cartController)
    {
        //
    }

   public function addToCart($id) {
       
    

   }

}
