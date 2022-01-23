<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\ordersProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Lottery;
use App\Models\User;
use Symfony\Component\Console\Input\Input;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    //
    public function index(Request $request)
    {
        $count_prd = DB::table('lottery')->where('qty', '!=', '0')->get();
        $count_order = DB::table('orders')->get();
        $count_orderPrd = DB::table('orders_products')->get();
        $count_member = DB::table('users')->get();
        return view('dashboard.index', compact(
            'count_prd',
            'count_order',
            'count_orderPrd',
            'count_member'
        ));
    }

    public function products(Request $request)
    {
        $count_prd = DB::table('lottery')->get();
        $count_prdSoldOut = DB::table('lottery')->where('qty', '=', '0')->get();
        $count_prdHave = DB::table('lottery')->where('qty', '!=', '0')->get();
        $products = DB::table('lottery')->paginate(50);
        return view('dashboard.products', compact('products', 'count_prd', 'count_prdSoldOut', 'count_prdHave'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    public function productSearch(Request $request)
    {
        $count_prd = DB::table('lottery')->get();
        $count_prdSoldOut = DB::table('lottery')->where('qty', '=', '0')->get();
        $count_prdHave = DB::table('lottery')->where('qty', '!=', '0')->get();
        $search = $request->get('number');
        $products = DB::table('lottery')->where('lottery_number', 'like', '%' . $search . '%')->paginate(50);
        return view('dashboard.products', ['products' => $products], compact('count_prd', 'count_prdSoldOut', 'count_prdHave'))->with('i', (request()->input('page', 1) - 1) * 50);
    }

    public function productSearchLast2(Request $request)
    {
        $count_prd = DB::table('lottery')->get();
        $count_prdSoldOut = DB::table('lottery')->where('qty', '=', '0')->get();
        $count_prdHave = DB::table('lottery')->where('qty', '!=', '0')->get();


        $num1 = $request->get('last2num1');
        $num2 = $request->get('last2num2');


        $products = DB::table('lottery')->where([
            ['lottery_number5', '=', $num1],
            ['lottery_number6', '=', $num2]
        ])
            ->paginate(50);


        return view('dashboard.products', ['products' => $products], compact('count_prd', 'count_prdSoldOut', 'count_prdHave'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    public function productReport(Request $request)
    {
        // $members = DB::table('users')->where('is_admin', '=', '0')->latest()->paginate(10);

        return view('dashboard.details.lottery_report');
    }


    public function members(Request $request)
    {
        $members = DB::table('users')->where('is_admin', '=', '0')->latest()->paginate(10);

        return view('dashboard.members', compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function memberSearch(Request $request)
    {
        $count_member = User::query();

        $search = $request->get('phone');
        $members = DB::table('users')->where('user_phone', 'like', '%' . $search . '%')->paginate(50);
        return view('dashboard.members', ['members' => $members], compact('count_member'))->with('i', (request()->input('page', 1) - 1) * 50);
    }


    public function memberDetail($id, Request $request)
    {

        $member = DB::table('users')->find($id);

        return view('dashboard.details.member_detail', compact('member'));
    }

    public function memberUpdate(Request $request, User $user)
    {
        $status = $request['user_status'];
        $id = $request->input('member_id');

        User::where('id', $id)->update(['user_status' => $status]);
        return redirect()->route('members')
            ->with('success', 'Updated Status successfully.');
    }


    public function stock(Request $request)
    {
        $count_prd = DB::table('lottery_stock')->get();
        $count_prdSoldOut = DB::table('lottery_stock')->where('qty', '=', '0')->get();
        $count_prdHave = DB::table('lottery_stock')->where('qty', '!=', '0')->get();
        $stock = DB::table('lottery_stock')->paginate(50);
        return view('dashboard.stock', compact('stock', 'count_prd', 'count_prdSoldOut', 'count_prdHave'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
        // return view('dashboard.stock');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function orders(Orders $orders)
    {

        $orders = Orders::latest()->paginate(10);
        return view('dashboard.orders', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function orderSearch(Request $request)
    {
        // $status = DB::table('orders')->select('status')->distinct()->get()->pluck('status')->sort();
        $orders = Orders::query();

        if ($request->pending) {
            // $orders->where('status', $request->status);
            $orders->where('status', $request->pending);
        } elseif ($request->processing) {
            $orders->where('status', $request->processing);
        } elseif ($request->completed) {
            $orders->where('status', $request->completed);
        } elseif ($request->decline) {
            $orders->where('status', $request->decline);
        } else {
            $orders->orderBy('created_at', 'desc')->get();
        }
        return view('dashboard.orders', [
            // 'status' => $status,
            'orders' => $orders->get(),
        ])->with('i');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function ordersDetail($id, Request $request, Orders $orders)
    {
        $orders = Orders::findOrFail($id);

        $data = ordersProducts::join('orders', 'orders.id', '=', 'orders_products.order_id')
            // ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.id', '=', $id)
            ->get([
                'orders_products.lottery_number',
                'orders_products.lottery_img',
                'orders_products.lottery_type',
                'orders_products.lottery_date_forward',
                'orders.status',
                'orders.fist_name',
                'orders.last_name',
                'orders.address',
                'orders.phone',
                'orders.created_at',
            ]);

        return view('dashboard.details.order_detail', compact('orders', 'data'))->with('i');
    }

    public function ordersUpdate(Request $request, Orders $orders)
    {
        $status = $request['status'];
        $id = $request->input('order_id');

        Orders::where('id', $id)->update(['status' => $status]);
        return redirect()->route('orders')
            ->with('success', 'Updated Status successfully.');
    }


    public function uploadLottery(Request $request)
    {
        $id = $request->input('id');
        $lottery_date = $request->input('lottery_date');
        $lottery_type = $request->input('lottery_type');
        $lottery_year = $request->input('lottery_year');
        $lottery_round = $request->input('lottery_round');
        $lottery_set = $request->input('lottery_set');
        $lottery_number = $request->input('lottery_number');
        $lottery_number1 = $request->input('lottery_number1');
        $lottery_number2 = $request->input('lottery_number2');
        $lottery_number3 = $request->input('lottery_number3');
        $lottery_number4 = $request->input('lottery_number4');
        $lottery_number5 = $request->input('lottery_number5');
        $lottery_number6 = $request->input('lottery_number6');
        $qty = $request->input('qty');
        $lottery_img = $request->input('lottery_img');
        $price = $request->input('price');
        $fee = $request->input('fee');

        $data = array(
            'id' => $id,
            "lottery_date" => $lottery_date,
            "lottery_type" => $lottery_type,
            "lottery_year" => $lottery_year,
            "lottery_round" => $lottery_round,
            "lottery_set" => $lottery_set,
            "lottery_number" => $lottery_number,
            "lottery_number1" => $lottery_number1,
            "lottery_number2" => $lottery_number2,
            "lottery_number3" => $lottery_number3,
            "lottery_number4" => $lottery_number4,
            "lottery_number5" => $lottery_number5,
            "lottery_number6" => $lottery_number6,
            "qty" => $qty,
            "lottery_img" => $lottery_img,
            "price" => $price,
            "fee" => $fee,
        );

        // DB::table('lottery')->insert($data);


        // $stock = $request->all();
        // $product = DB::table('lottery');

        // foreach ($stock as $data) {

        //     $product->create([
        //         'id' => $data->lot_id,
        //         'lottery_date' => $data->lottery_date,
        //         'lottery_type' => $data->lottery_type,
        //         'lottery_year' => $data->lottery_year,
        //         'lottery_round' => $data->lottery_round,
        //         'lottery_set' => $data->lottery_set,
        //         'lottery_number' => $data->lottery_number,
        //         'lottery_number1' => $data->lottery_number1,
        //         'lottery_number2' => $data->lottery_number2,
        //         'lottery_number3' => $data->lottery_number3,
        //         'lottery_number4' => $data->lottery_number4,
        //         'lottery_number5' => $data->lottery_number5,
        //         'lottery_number6' => $data->lottery_number6,
        //         'qty' => $data->qty,
        //         'lottery_img' => $data->lottery_img,
        //         'price' => $data->price,
        //         'fee' => $data->fee,
        //     ]);
        // }

        // DB::table('lottery_stock')->where('updated_at', '<', now()->subYears(5))
        //     ->each(function ($oldRecord) {
        //         $newPost = $oldRecord->replicate();
        //         $newPost->setTable('lottery');
        //         $newPost->save();
        //     });

        // $payment = DB::table('lottery_stock')->insert($request->all());
        DB::table('lottery_stock')->get()
            ->where('updated_at', '<', now()->subYears(3))
            ->each(function ($oldRecord) {
                $newRecord = $oldRecord->replicate();
                $newRecord->setTable('lottery');
                $newRecord->save();
                // $oldRecord->delete();
            });

        return redirect()->route('products')
            ->with('success', 'Updated Status successfully.');
    }

    public function memSearch(Request $request)
    {
        // $count_prd = DB::table('lottery')->get();
        // $count_prdSoldOut = DB::table('lottery')->where('qty', '=', '0')->get();
        // $count_prdHave = DB::table('lottery')->where('qty', '!=', '0')->get();
        $search = $request->get('memberSch');
        $members = DB::table('users')
            ->where('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->orWhere('user_phone', 'like', '%' . $search . '%')
            ->paginate(50);
        return view('dashboard.members', ['members' => $members])->with('i', (request()->input('page', 1) - 1) * 50);
    }
}
