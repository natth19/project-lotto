@extends('pages.app')

@section('content')
<link rel="stylesheet" href="/css/Home.css">
<link rel="stylesheet" href="/css/Lottery.css">
<!-- Content -->
<style>
    .pagination {
        justify-content: center;
        margin-top: 50px;
    }

    .page-link {
        z-index: auto;
    }
</style>

<div class="container-Home">

    <div class="ImgSlide">
        <!-- <img src="/images/imgSlide.png"></img> -->
        <!-- <h1 class="welcomeText w3-animate-zoom">ยินดีต้อนรับ</h1> -->
        <div style="text-align:center;">
            <img class="logo_login" src="/images/logo.png" alt="โอ่งข้าวโอ่งน้ำพารวย" style="max-width: 150px;height:auto;">
        </div>
    </div>
    <form class="LotterySearch" action="{{ route('home.lottoAll') }}" method="get" id="lotAll">
        @csrf
        <h1>กรอกเลขล็อตเตอรี่ที่ต้องการค้นหา</h1>
        <!-- All -->
        <div class="GetNumLottery" id="search" style="display: block;">
            <input class="lotSearch" id="lotnum1" type="text" name="lotnum1" maxlength="1" pattern="[0-9]" inputmode="numeric" placeholder="" onkeyup="moveOnMax(this,'lotnum2')" onkeypress="return onlyNumberKey(event)">
            <input class="lotSearch" id="lotnum2" type="text" name="lotnum2" maxlength="1" pattern="[0-9]" inputmode="numeric" placeholder="" onkeyup="moveOnMax(this,'lotnum3')" onkeypress="return onlyNumberKey(event)">
            <input class="lotSearch" id="lotnum3" type="text" name="lotnum3" maxlength="1" pattern="[0-9]" inputmode="numeric" placeholder="" onkeyup="moveOnMax(this,'lotnum4')" onkeypress="return onlyNumberKey(event)">
            <input class="lotSearch" id="lotnum4" type="text" name="lotnum4" maxlength="1" pattern="[0-9]" inputmode="numeric" placeholder="" onkeyup="moveOnMax(this,'lotnum5')" onkeypress="return onlyNumberKey(event)">
            <input class="lotSearch" id="lotnum5" type="text" name="lotnum5" maxlength="1" pattern="[0-9]" inputmode="numeric" placeholder="" onkeyup="moveOnMax(this,'lotnum6')" onkeypress="return onlyNumberKey(event)">
            <input class="lotSearch" id="lotnum6" type="text" name="lotnum6" maxlength="1" pattern="[0-9]" inputmode="numeric" placeholder="" onkeyup="moveOnMax(this,'submit')" onkeypress="return onlyNumberKey(event)">
        </div>


        <div class="LotterySet">
            <button type="button" class="btnSet3" id="btnSet3" onclick="set3first()">เลขหน้า 3 ตัว</button>
            <button type="button" class="btnSet2" id="btnSet2" onclick="set3last()">เลขท้าย 3 ตัว</button>
            <button type="button" class="btnSet1" id="btnSet1" onclick="set2last()">เลขท้าย 2 ตัว</button>
        </div>
        <div class="ButtonSearch">
            <button type="button" class="btnDel" id="btnClearNum" onclick="clearSearch()">ลบตัวเลข</button>
            <!-- <button class="btnSearch">ค้นหาล็อตเตอรี่</button> -->
            <input type="submit" class="btnSearch" id="submit" value="ค้นหาล็อตเตอรี่">
        </div>
    </form>
    <!-- <div>
        @if ($message = Session::get('error'))
        <div style="background:red; padding:10px;">
            <p class="text-green-800" style="margin-bottom: 0;color:white;">{{ $message }}</p>
        </div>
        @endif
    </div> -->

    <div class="LotteryList" id="lotteryTop">
        <div>
            <p class="txtHeadList">เลือกเลขที่ชอบ</p>
            <p class="line"></p>
        </div>
        <div class="SelectBtnLotSet">
            <div class="box-select" id="btnFilter">
                <button class="selectType active" onclick="filterSelection('all')">ชุดทั้งหมด</button>
                <button class="selectType" onclick="filterSelection('1')">1 ใบ</button>
                <button class="selectType" onclick="filterSelection('2')">2 ใบ</button>
                <button class="selectType" onclick="filterSelection('3')">3 ใบ</button>
                <button class="selectType" onclick="filterSelection('4')">4 ใบ</button>
                <button class="selectType" onclick="filterSelection('5')">5 ใบ</button>
            </div>
        </div>
        <div class="ListView">
            
            <div class="card-home-gird">

                @foreach ($lottery as $key => $value)

                @if($value->qty === 1)
                <div class="container-card" id="row_{{ ++$i }}">
                    <div class="Card-Lottery {{ $value->lottery_type }}" id='{{ $value->lotto_code }}'>
                        <div class="container-card taxLot">
                            <p class="nameLot">ชุด {{ $value->lottery_type }} ใบ</p>
                        </div>
                        <div class="box-color">
                            @if($value->lottery_type === 1)
                            <div>
                                <img class="lottery_img" src="{{ $value->lottery_img }}">
                            </div>
                            @endif

                            @if($value->lottery_type === 2)
                            <div class="image-lottery-2">
                                <div class="lot-img-2">
                                    <img class="lottery-1 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-2 lottery_img" src="{{ $value->lottery_img }}">
                                </div>
                            </div>
                            @endif

                            @if($value->lottery_type === 3)
                            <div class="image-lottery-3">
                                <div class="lot-img-3">
                                    <img class="lottery-1 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-2 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-3 lottery_img" src="{{ $value->lottery_img }}">
                                </div>
                            </div>
                            @endif

                            @if($value->lottery_type === 4)
                            <div class="image-lottery-4">
                                <div class="lot-img-4">
                                    <img class="lottery-1 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-2 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-3 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-4 lottery_img" src="{{ $value->lottery_img }}">
                                </div>
                            </div>
                            @endif

                            @if($value->lottery_type === 5)
                            <div class="image-lottery-5">
                                <div class="lot-img-5">
                                    <img class="lottery-1 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-2 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-3 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-4 lottery_img" src="{{ $value->lottery_img }}">
                                    <img class="lottery-5 lottery_img" src="{{ $value->lottery_img }}">
                                </div>
                            </div>
                            @endif

                            <div class="btn-cart">
                                <form id="getCartForm" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    <!-- <form id="btnCartForm"> -->

                                    @csrf
                                    <input type="hidden" value="{{ $value->id }}" name="lottery_id">
                                    <input type="hidden" value="{{ $value->lotto_code }}" name="lotto_code">
                                    <input type="hidden" value="{{ $value->lottery_number }}" name="lottery_number">
                                    <input type="hidden" value="{{ $value->lottery_type }}" name="lottery_type">
                                    <input type="hidden" value="{{ $value->lottery_year }}" name="lottery_year">
                                    <input type="hidden" value="{{ $value->lottery_round }}" name="lottery_round">
                                    <input type="hidden" value="{{ $value->lottery_set }}" name="lottery_set">
                                    <input type="hidden" value="{{ $value->lottery_date }}" name="lottery_date">
                                    <input type="hidden" value="{{ $value->lottery_img }}" name="lottery_img">
                                    <input type="hidden" value="{{ $value->price }}" name="price">
                                    <input type="hidden" value="{{ $value->fee }}" name="fee">
                                    <input type="hidden" value="{{ $value->qty }}" name="qty">
                                    <input type="hidden" value="{{ $value->lottery_type }}" name="quantity">

                                    <button id="$value->lottery_number" type="submit" title="{{$value->lottery_number}}" class="save-data">
                                        <i class="fa fa-shopping-cart"></i>
                                        <p>เพิ่มลงในตะกร้า</p>
                                    </button>
                                    <!-- <p class="btn-holder" style="padding:0; "><a href="{{ route('cart.store', $value->id) }}" class="btn btn-success btn-block text-center" role="button"><i class="fa fa-shopping-cart"></i>เพิ่มลงในตะกร้า</a> </p> -->

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
            <div class="paginate-box">
                {!! $lottery->links() !!}
            </div>
        </div>

    </div>
</div>

<script>
    /** Filter **/
    filterSelection("all")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("Card-Lottery");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current control button (highlight it)
    var btnContainer = document.getElementById("btnFilter");
    var btns = btnContainer.getElementsByClassName("selectType");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

    $(document).ready(function() {
        $("#btnSet3").click(function() {
            $('#lotAll').attr('action', "{{ route('home.lottoFirst3') }}");

        });
        $("#btnSet2").click(function() {
            $('#lotAll').attr('action', "{{ route('home.lottoLast3') }}");

        });
        $("#btnSet1").click(function() {
            $('#lotAll').attr('action', "{{ route('home.lottoLast2') }}");

        });
        $("#btnClearNum").click(function() {
            $('#lotAll').attr('action', "{{ route('home.lottoAll') }}");

        });
    });
</script>

@endsection