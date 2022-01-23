<?php

namespace App\Http\Controllers;

use App\Models\CartOrder;
use Illuminate\Http\Request;

class CartOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.cart');
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
     * @param  \App\Models\CartOrder  $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function show(CartOrder $cartOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartOrder  $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(CartOrder $cartOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartOrder  $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartOrder $cartOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartOrder  $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartOrder $cartOrder)
    {
        //
    }
}
