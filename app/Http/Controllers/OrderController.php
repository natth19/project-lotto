<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Orders;
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
        //Insert into order table
        $request->validate([
            'billing_fname' => 'required',
            'billing_lname' => 'required',
            'billing_address' => 'required',
            'billing_phone' => 'required',
            'billing_lottery' => 'required',
            'billing_price' => 'required',
            'billing_fee' => 'required',
            'billing_total' => 'required',
        ]);

        $order = Orders::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_fname' => $request->billing_fname,
            'billing_lname' => $request->billing_lname,
            'billing_address' => $request->billing_address,
            'billing_phone' => $request->billing_phone,
            'billing_lottery' => $request->billing_lottery,
            'billing_price' => $request->billing_price,
            'billing_fee' => $request->billing_fee,
            'billing_total' => $request->billing_total,
        ]);
        $history_order = History::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_fname' => $request->billing_fname,
            'billing_lname' => $request->billing_lname,
            'billing_address' => $request->billing_address,
            'billing_phone' => $request->billing_phone,
            'billing_lottery' => $request->billing_lottery,
            'billing_price' => $request->billing_price,
            'billing_fee' => $request->billing_fee,
            'billing_total' => $request->billing_total,
        ]);
        return redirect('pages.history')
            ->with('success', 'Order Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
