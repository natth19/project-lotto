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

        $lottery = DB::table('lottery')->paginate(50);
        // $query = DB::table('lottery')->select("lotto_code")->distinct();
        // $lottery = $query->paginate(50);
        // $lottery = DB::table('lottery')->groupBy('lotto_code')->havingRaw('count(*) > 1')->paginate(50);


        // $query = DB::table('lottery')->distinct('lotto_code')->select('lotto_code');
        // $lottery = $query
        // // ->addSelect('id')
        // ->addSelect('lottery_number')
        // ->addSelect('lottery_type')
        // // ->addSelect('lottery_img')
        // ->addSelect('lottery_year')
        // ->addSelect('lottery_round')
        // ->addSelect('lottery_set')
        // ->addSelect('lottery_date')
        // ->addSelect('price')
        // ->addSelect('fee')
        // ->addSelect('qty')
        // ->paginate(50);

        // $lottery = DB::table('lottery')
        //             ->select('lotto_code', DB::raw('count(`lotto_code`) as occurences'))
        //             ->groupBy('lotto_code')
        //             ->having('occurences', '>', 1)
        //             ->paginate(50);

        // $lottoSet = DB::table('lottery')->select('lottery_img')->where('lotto_code' ,'=' , $query)->get();
        // $entity['columns'] = ['username', 'surname'];

        // $groupBy = implode(',', $entity['columns']);

        // $subQuery = DB::table('list')
        //     ->select('*')
        //     ->groupBy($groupBy)
        //     ->havingRaw('(count(id) > 1))');

        // $result = DB::table('list')
        //     ->select('*')
        //     ->join(
        //         DB::raw("({$subQuery->toSql()}) dup"),
        //         function ($join) use ($entity) {
        //             foreach ($entity['columns'] as $column) {
        //                 $join->on('list.' . $column, '=', 'dup.' . $column);
        //             }
        //         }
        //     )
        //     ->toSql();
        // or ->get(); obviously

        // dd($result);



        return view('pages.index', compact('lottery'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function search(Request $request)
    // {

    //     $lottery = DB::table('lottery')->where([
    //         ['lottery_number', '!=', Null],
    //         [function ($query) use ($request) {
    //             if (($lotnum1 = $request->lotnum1)) {
    //                 $query->OrWhere('lottery_number1', 'LIKE', '%' . $lotnum1 . '%');
    //             } elseif (($lotnum2 = $request->lotnum2)) {
    //                 $query->OrWhere('lottery_number2', 'LIKE', '%' . $lotnum2 . '%');
    //             } elseif (($lotnum3 = $request->lotnum3)) {
    //                 $query->OrWhere('lottery_number3', 'LIKE', '%' . $lotnum3 . '%');
    //             } elseif (($lotnum4 = $request->lotnum4)) {
    //                 $query->OrWhere('lottery_number4', 'LIKE', '%' . $lotnum4 . '%');
    //             } elseif (($lotnum5 = $request->lotnum5)) {
    //                 $query->OrWhere('lottery_number5', 'LIKE', '%' . $lotnum5 . '%');
    //             } elseif (($lotnum6 = $request->lotnum6)) {
    //                 $query->OrWhere('lottery_number6', 'LIKE', '%' . $lotnum6 . '%');
    //             }
    //         }]
    //     ])
    //         ->orderBy("lottery_number", "desc")
    //         ->get();
    // }

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
        }
        else if (count($request->all()) < 0) {

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
