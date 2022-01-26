<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\History;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use App\Models\ordersProducts;
use Darryldecode\Cart\Cart;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cartList()
    {


        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('pages.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {

        // if (DB::table('lottery')->where('id' , $request->qty = '0')) {
        //     session()->flash('error', 'Lottery is Out stock');
        //     return redirect()->route('home');
        // } 
        // else {

        \Cart::add([
            // 'id' => $request->id,
            // 'name' => $request->name,
            // 'price' => $request->price,
            // 'quantity' => $request->quantity,
            // 'attributes' => array(
            //     'image' => $request->image,
            // )


            'id' => $request->lottery_id,
            'lotto_code' => $request->lotto_code,
            'lottery_number' => $request->lottery_number,
            'lottery_type' => $request->lottery_type,
            'lottery_year' => $request->lottery_year,
            'lottery_round' => $request->lottery_round,
            'lottery_set' => $request->lottery_set,
            'lottery_date' => $request->lottery_date,
            'price' => $request->price,
            'fee' => $request->fee,
            'quantity' => $request->quantity,
            'lottery_img' => $request->lottery_img,
            // 'attributes' => array(
            //     'lottery_img' => $request->input('lottery_img'),
            // )
        ]);

        DB::table('lottery')->where('lotto_code', $request->lotto_code)->update([
            'qty' => 0
        ]);
        // DB::table('lottery')->where('id', $request->lottery_id)->update([
        //     'qty' => 0
        // ]);


        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('home');
        // }
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);

        DB::table('lottery')->where('lotto_code', $request->id)->update([
            'qty' => 1
        ]);

        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart(Request $request)
    {
        \Cart::clear();
        DB::table('lottery')->where('id', $request->id)->update([
            'qty' => 1
        ]);

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        // echo "<script>setTimeout(function(){ window.location.href = '/home'; }, 6000);</script>";
        $cartItems = \Cart::getContent();

        // dd($cartItems);


        return view('pages.checkout', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cartCheckout(Request $request)
    {

        //*! This Try get data for loop !*//
        //*! End !*//
        //** Check out **/

        if ($request->hasFile('slip_img')) {
            // $request->validate([
            //     'slip_img' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            // ]);
            $this->validate(request(), [
                'slip_img' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'fist_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'payment' => 'required',
                'slip_img' => 'required',
                'quantity' => 'required',
                'total_price' => 'required',
            ]);

            $request->slip_img->store('slip_payment', 'public');

            $orders = new Orders();
            $orders->user_id = auth()->user() ? auth()->user()->id : null;
            $orders->fist_name = $request->input('fist_name');
            $orders->last_name = $request->input('last_name');
            $orders->address = $request->input('address');
            $orders->phone = $request->input('phone');
            $orders->payment = $request['payment'];
            $orders->billing_slip_img = $request['slip_img']->hashName();
            $orders->quantity = $request['quantity'];
            $orders->total_price = $request['total_price'];
            $orders->status = 'pending';
            $orders->save();
        }
        $order_id = DB::getPdo()->lastInsertId();


        $cartItems = \Cart::getContent();
        $OrderPro = new ordersProducts();
        foreach ($cartItems as $data) {

            $OrderPro->create([
                'order_id' => $order_id,
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'lottery_id' => $data->id,
                'lottery_number' => $data->lottery_number,
                'lottery_type' => $data->lottery_type,
                'lottery_set' => $data->lottery_set,
                'lottery_round' => $data->lottery_round,
                'lottery_year' => $data->lottery_year,
                'lottery_date_forward' => $data->lottery_date,
                'lottery_img' => $data->lottery_img,
                'price' => $data->price,
                'quantity' => $data->quantity,
            ]);

            // $lottery = DB::table('lottery')->where('id', $data->id)->first();
            // $lottery->qty = $lottery->qty - 1;
            // $lottery->update();

            DB::table('lottery')->where('id', $data->id)->update([
                'qty' => 0
            ]);
        }

        \Cart::clear();

        return redirect()->route('history');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cartCheckoutCod(Request $request)
    {

        //*! This Try get data for loop !*//
        //*! End !*//
        //** Check out **/


        $this->validate(request(), [
            'fist_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'payment' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
        ]);

        $orders = new Orders();
        $orders->user_id = auth()->user() ? auth()->user()->id : null;
        $orders->fist_name = $request->input('fist_name');
        $orders->last_name = $request->input('last_name');
        $orders->address = $request->input('address');
        $orders->phone = $request->input('phone');
        $orders->payment = $request['payment'];
        $orders->billing_slip_img = null;
        $orders->quantity = $request['quantity'];
        $orders->total_price = $request['total_price'];
        $orders->status = 'pending';
        $orders->save();

        $order_id = DB::getPdo()->lastInsertId();


        $cartItems = \Cart::getContent();
        $OrderPro = new ordersProducts();
        foreach ($cartItems as $data) {

            $OrderPro->create([
                'order_id' => $order_id,
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'lottery_id' => $data->id,
                'lottery_number' => $data->lottery_number,
                'lottery_type' => $data->lottery_type,
                'lottery_set' => $data->lottery_set,
                'lottery_round' => $data->lottery_round,
                'lottery_year' => $data->lottery_year,
                'lottery_date_forward' => $data->lottery_date,
                'lottery_img' => $data->lottery_img,
                'price' => $data->price,
                'quantity' => $data->quantity,
            ]);

            // $lottery = DB::table('lottery')->where('id', $data->id)->first();
            // $lottery->qty = $lottery->qty - 1;
            // $lottery->update();

            DB::table('lottery')->where('id', $data->id)->update([
                'qty' => 0
            ]);
        }

        \Cart::clear();

        return redirect()->route('history');
    }
}
