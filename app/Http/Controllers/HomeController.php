<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Block\Element\Document;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

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

        $lottery = DB::table('lottery')->groupBy('lotto_code')->paginate(50);
        return view('pages.index', compact('lottery'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    public function lottoAll(Request $request)
    {

        $lotterys = [
            $num1 = $request->get('lotnum1'),
            $num2 = $request->get('lotnum2'),
            $num3 = $request->get('lotnum3'),
            $num4 = $request->get('lotnum4'),
            $num5 = $request->get('lotnum5'),
            $num6 = $request->get('lotnum6')
        ];


        if (count($lotterys) > 0) {

            $lottery = DB::table('lottery')->where([
                ['lottery_number1', '=', $num1],
                ['lottery_number2', '=', $num2],
                ['lottery_number3', '=', $num3],
                ['lottery_number4', '=', $num4],
                ['lottery_number5', '=', $num5],
                ['lottery_number6', '=', $num6],
            ])
                ->paginate(50);

            return view('pages.index', ['lottery' => $lottery])
                ->with('i', (request()->input('page', 1) - 1) * 50);
        } else if (count($request->all()) < 0) {

            return redirect()->route('home');
        }
    }

    public function lottoFirst3(Request $request)
    {

        $lotterys = [
            $num1 = $request->get('lotnum1'),
            $num2 = $request->get('lotnum2'),
            $num3 = $request->get('lotnum3'),
        ];

        if ($lotterys != null) {
            $lottery = DB::table('lottery')->where([
                ['lottery_number1', '=', $num1],
                ['lottery_number2', '=', $num2],
                ['lottery_number3', '=', $num3],
            ])
                ->paginate(50);

            return view('pages.index', ['lottery' => $lottery])
                ->with('i', (request()->input('page', 1) - 1) * 50);
        } else {

            $lottery = DB::table('lottery')->get();

            return view('pages.index', ['lottery' => $lottery])
                ->with('i', (request()->input('page', 1) - 1) * 50);
        }
    }

    public function lottoLast3(Request $request)
    {

        $lotterys = [
            $num4 = $request->get('lotnum4'),
            $num5 = $request->get('lotnum5'),
            $num6 = $request->get('lotnum6')
        ];

        if ($lotterys != null) {
            $lottery = DB::table('lottery')->where([
                ['lottery_number4', '=', $num4],
                ['lottery_number5', '=', $num5],
                ['lottery_number6', '=', $num6],
            ])
                ->paginate(50);

            return view('pages.index', ['lottery' => $lottery])
                ->with('i', (request()->input('page', 1) - 1) * 50);
        } else {

            $lottery = DB::table('lottery')->get();

            return view('pages.index', ['lottery' => $lottery])
                ->with('i', (request()->input('page', 1) - 1) * 50);
        }
    }
    public function lottoLast2(Request $request)
    {


        $lotterys = [
            $num5 = $request->get('lotnum5'),
            $num6 = $request->get('lotnum6')
        ];

        if ($lotterys != null) {
            $lottery = DB::table('lottery')->where([
                ['lottery_number5', '=', $num5],
                ['lottery_number6', '=', $num6],
            ])
                ->paginate(50);

            return view('pages.index', ['lottery' => $lottery])
                ->with('i', (request()->input('page', 1) - 1) * 50);
        } else {

            $lottery = DB::table('lottery')->get();

            return view('pages.index', ['lottery' => $lottery])
                ->with('i', (request()->input('page', 1) - 1) * 50);
        }
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
