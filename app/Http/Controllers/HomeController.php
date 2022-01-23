<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Block\Element\Document;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $lottery = DB::table('lottery')->get();

        //* Test code **/ 
        // $lottery = DB::table('lottery')->where([
        //     ['lottery_number', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($lotnum1 = $request->lotnum1)) {
        //             $query->OrWhere('lottery_number1', 'LIKE', '%' . $lotnum1 . '%');
        //         } elseif (($lotnum2 = $request->lotnum2)) {
        //             $query->OrWhere('lottery_number2', 'LIKE', '%' . $lotnum2 . '%');
        //         } elseif (($lotnum3 = $request->lotnum3)) {
        //             $query->OrWhere('lottery_number3', 'LIKE', '%' . $lotnum3 . '%');
        //         } elseif (($lotnum4 = $request->lotnum4)) {
        //             $query->OrWhere('lottery_number4', 'LIKE', '%' . $lotnum4 . '%');
        //         } elseif (($lotnum5 = $request->lotnum5)) {
        //             $query->OrWhere('lottery_number5', 'LIKE', '%' . $lotnum5 . '%');
        //         } elseif (($lotnum6 = $request->lotnum6)) {
        //             $query->OrWhere('lottery_number6', 'LIKE', '%' . $lotnum6 . '%');
        //         }
        //     }]
        // ])
        //     ->orderBy("lottery_number", "desc")
        //     ->get();

        // $cart = Cart::content();
        return view('pages.index', compact('lottery'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {

        $lottery = DB::table('lottery')->where([
            ['lottery_number', '!=', Null],
            [function ($query) use ($request) {
                if (($lotnum1 = $request->lotnum1)) {
                    $query->OrWhere('lottery_number1', 'LIKE', '%' . $lotnum1 . '%');
                } elseif (($lotnum2 = $request->lotnum2)) {
                    $query->OrWhere('lottery_number2', 'LIKE', '%' . $lotnum2 . '%');
                } elseif (($lotnum3 = $request->lotnum3)) {
                    $query->OrWhere('lottery_number3', 'LIKE', '%' . $lotnum3 . '%');
                } elseif (($lotnum4 = $request->lotnum4)) {
                    $query->OrWhere('lottery_number4', 'LIKE', '%' . $lotnum4 . '%');
                } elseif (($lotnum5 = $request->lotnum5)) {
                    $query->OrWhere('lottery_number5', 'LIKE', '%' . $lotnum5 . '%');
                } elseif (($lotnum6 = $request->lotnum6)) {
                    $query->OrWhere('lottery_number6', 'LIKE', '%' . $lotnum6 . '%');
                }
            }]
        ])
            ->orderBy("lottery_number", "desc")
            ->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser
                ->visit('http://127.0.0.1:8000/home')
                ->driver->executeScript('window.scrollTo(0, 500);');
            // can't chain methods after this
            $browser
                ->click('label[for=test_1]')
                ->pause(500); //you can keep chaining here;
        });
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function loginPage()
    // {
    //     return view('pages.login');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function profile()
    // {
    //     // 
    //     return view('pages.profile');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function EditProfile()
    // {
    //     // 
    //     return view('pages.edit_profile');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function history()
    {
        // 
        return view('pages.history');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        // 
        return view('pages.contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {
        // 
        return view('pages.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function lotteryApi()
    {
        // 
        return DB::table('lottery')->get();
        // return response()->json($lottery);
    }
}
