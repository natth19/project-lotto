<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->id;
        $data = DB::table('users')
            ->join('orders_products', 'users.id', '=', 'orders_products.user_id')
            ->join('orders', 'orders_products.order_id', '=', 'orders.id')
            ->where('users.id',$user)->orderBy('id', 'desc')
            ->get([
                'orders_products.lottery_number',
                'orders.status',
                'orders.id',
                'orders_products.lottery_img',
                'orders_products.lottery_type',
                'orders.total_price',
            ]);

        // if($user->id == $data){
        //     return view('pages.history', compact('data'));
        // }

        // $data = DB::table('users')->join('orders_products', 'orders_products.user_id', '=', 'users.id')
        //     ->join('orders', 'orders.id', '=', 'orders_products.order_id')
        //     // ->latest()
        //     // ->get()->all();
        //     ->get([
        //         'orders_products.lottery_number',
        //         'orders.status',
        //         'orders_products.lottery_img',
        //         'orders_products.lottery_type',
        //         'orders.total_price',
        //     ]);



        // $data = latest()->first();
        return view('pages.history', compact('data'));
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
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }
}
