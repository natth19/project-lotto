@extends('pages.app')


@section('content')
<!-- <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"> -->
<link rel="stylesheet" href="/css/cart.css">
<link rel="stylesheet" href="/css/Lottery.css">
<link rel="stylesheet" href="/css/radio.css">
<!-- Content -->
<div class="Cart-container">
    <div class="head-card">
        @if(Cart::getTotalQuantity() == 0)
        <div class="cart-title">
            <p style="font-size: 36px;">ตะกร้าสินค้า</p>
            <img src="/images/empty-cart.png" width="100px" height="auto" style="opacity: 30%;margin-right: 10px;margin-top:150px;">
            <p style="font-size: 22px;margin-top:10px;opacity: 50%;">ไม่มีของในตะกร้า</p>
        </div>
        @endif

        @if(Cart::getTotalQuantity() > 0)
        <div class="cart-title">
            <h1>ตะกร้าสินค้า</h1>
            <p>รายการที่เลือกไว้</p>
            <p>สินค้าในตะกร้าจะถูกลบออกอัตโนมัติเมื่อท่านออกจากเว็บไซต์</p>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>
            There were some problems with your input. <br><br>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <!-- <div class="loading">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->

    <!-- <div>
            @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
            @endif
        </div> -->

    <div class="template-order-card" id="orderItem">

        @foreach ($cartItems as $item => $value)
        <div class="card-order" id="row_{{$value->id}}">
            <div class="order">
                <div class="Card-Lottery-Order">
                    @if ( $value -> lottery_type === '1' )
                    <div class="box-order-img">
                        <img src="{{ url($value->lottery_img) }}" class="lottery" width="285px" max-height="auto">
                    </div>
                    @endif

                    @if ( $value -> lottery_type === '2' )
                    <div class="image-lottery-2">
                        <div class="lot-img-2">
                            <img class="lottery-1 lottery_img" src="{{ $value->lottery_img }}"  class="lottery" width="285px" max-height="auto">
                            <img class="lottery-2 lottery_img" src="{{ $value->lottery_img }}"  class="lottery" width="285px" max-height="auto">
                        </div>
                    </div>
                    <div class="box-order-img" style="display: none;">
                        <img src="{{ url($value->lottery_img) }}" class="lottery" >
                        <img src="{{ url($value->lottery_img) }}" class="lottery" >
                    </div>
                    @endif

                    @if ( $value -> lottery_type === '3' )
                    <div class="image-lottery-3">
                        <div class="lot-img-3">
                            <img class="lottery-1 lottery_img" src="{{ $value->lottery_img }}"  class="lottery" width="285px" max-height="auto">
                            <img class="lottery-2 lottery_img" src="{{ $value->lottery_img }}"  class="lottery" width="285px" max-height="auto">
                            <img class="lottery-3 lottery_img" src="{{ $value->lottery_img }}"  class="lottery" width="285px" max-height="auto">
                        </div>
                    </div>
                    <div class="box-order-img" style="display: none;">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                    </div>
                    @endif

                    @if ( $value -> lottery_type === '4' )
                    <div class="image-lottery-4">
                        <div class="lot-img-4" style="display: none;">
                            <img class="lottery-1 lottery_img" src="{{ $value->lottery_img }}" class="lottery" width="285px" max-height="auto">
                            <img class="lottery-2 lottery_img" src="{{ $value->lottery_img }}" class="lottery" width="285px" max-height="auto">
                            <img class="lottery-3 lottery_img" src="{{ $value->lottery_img }}" class="lottery" width="285px" max-height="auto">
                            <img class="lottery-4 lottery_img" src="{{ $value->lottery_img }}" class="lottery" width="285px" max-height="auto">
                        </div>
                    </div>
                    <div class="box-order-img" style="display: none;">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                    </div>
                    @endif

                    @if ( $value -> lottery_type === '5' )
                    <div class="image-lottery-5">
                        <div class="lot-img-5">
                            <img class="lottery-1 lottery_img" src="{{ url($value->lottery_img) }}" class="lottery" width="285px" max-height="auto">
                            <img class="lottery-2 lottery_img" src="{{ url($value->lottery_img) }}" class="lottery" width="285px" max-height="auto">
                            <img class="lottery-3 lottery_img" src="{{ url($value->lottery_img) }}" class="lottery" width="285px" max-height="auto">
                            <img class="lottery-4 lottery_img" src="{{ url($value->lottery_img) }}" class="lottery" width="285px" max-height="auto">
                            <img class="lottery-5 lottery_img" src="{{ url($value->lottery_img) }}" class="lottery" width="285px" max-height="auto">
                        </div>
                    </div>
                    <div class="box-order-img" style="display: none;">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                        <img src="{{ url($value->lottery_img) }}" class="lottery">
                    </div>
                    @endif

                </div>

                <div class="detail-order">
                    <table>
                        <thead>
                            <tr>
                                <th>เลขที่เลือก</th>
                                <th>จำนวน/ใบ</th>
                                <th>ราคาฉลาก</th>
                                <th>ลบรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="detail-result">{{ $value->lottery_number }}</td>
                                <td class="detail-result">{{ $value->lottery_type }}</td>
                                <td class="detail-result">{{$value->price }}฿</td>
                                
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $value->id }}" name="id">
                                    <td class="detail-result"><button type="delete" id="del-item-cart"><i class="fa fa-trash"></i></button></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach


        @if(count($cartItems) > 0)
        <div class="card-box-detail">
            <div class="cart-total-price">
                <p>ค่าดำเนินการ 20 บาท / ใบ</p>
                <div class="line"></div>
                <div class="total-fee">
                    <p class="text-fee">ค่าดำเนินการ</p>
                    <p class="feeCount">{{20*Cart::getTotalQuantity()}} ฿</p>
                </div>
            </div>
            <div class="all-order">
                <p>จำนวน {{Cart::getTotalQuantity()}} ใบ : </p>
                <p class="order-price-lot">{{ Cart::getTotal()}} ฿</p>
            </div>
            <div class="total-order-details">
                <div class="lot-order">
                    <p>รวมการสั่งซื้อ</p>
                    <p class="lot-order-price">{{ Cart::getTotal() }} ฿</p>
                    <!-- <p class="lot-order-price">320 ฿</p> -->
                </div>
                <div class="fee-order">
                    <p>ค่าดำเนินการทั้งสิ้น</p>
                    <p class="fee-order-price">{{20*Cart::getTotalQuantity()}} ฿</p>
                </div>
                <div class="total-order">
                    <p>ยอดชำระทั้งหมด</p>
                    <p class="total-order-price">{{ Cart::getTotal()+20*Cart::getTotalQuantity() }} ฿</p>
                </div>
            </div>

            <div class="total-order-details">
                <div class="justify-center">
                    <p>ที่อยู่สำหรับจัดส่ง</p>
                    <p>{{ Auth::user()->user_address}} </p>
                    <!-- <p class="lot-order-price">320 ฿</p> -->
                </div>
            </div>

            @if(Auth::user()->user_status === 'VIP')
            <div class="box-payment">
                <p for="payment" class="label-payment">วิธีการชำระเงิน</p>
                <select name="payment" class="form-select form-select-lg" aria-label="Default select example" id="payment">
                    <option value="promptPay">PromptPay</option>
                    <option value="cod">ชำระปลายทาง</option>
                </select>
            </div>
            @endif

            <div class="total-order-pay">
                <div class="text-order-pay">
                    <p>ยอดที่ต้องชำระ: {{Cart::getTotalQuantity()}}</p>
                    <p>{{ Cart::getTotal() + 20 * Cart::getTotalQuantity() }} ฿</p>
                </div>
                <div class="box-btn-pay" id="box-btn-pay">
                    <a href="{{ route('cart.viewCheckout') }}">
                        <button type="button" class="btn-pay" id="btnPayOrder">ชำระเงิน</button>
                    </a>

                    <div id="submitCod" class="box-button-cod" style="display: none;">
                        <form action="{{ route('cart.checkoutCod') }}" method="POST" enctype="multipart/form-data">
                            <div class="button-submit">
                                @foreach ($cartItems as $order)
                                @csrf
                                <!-- <input type="hidden" id="slip_img" name="slip_img" value=""> -->
                                <input type="hidden" name="payment" value="COD">
                                <input type="hidden" value="{{ $order->id }}" name="lottery_id" required>
                                <input type="hidden" value="{{ $order->lottery_number }}" name="billing_lottery" required>
                                <input type="hidden" value="{{ $order->lottery_type }}" name="billing_lotType" required>
                                <input type="hidden" value="{{ $order->lottery_year }}" name="billing_lotYear" required>
                                <input type="hidden" value="{{ $order->lottery_round }}" name="billing_lotRound" required>
                                <input type="hidden" value="{{ $order->lottery_set }}" name="billing_lotSet" required>
                                <input type="hidden" value="{{ $order->lottery_date }}" name="billing_lotDate" required>
                                <input type="hidden" value="{{ $order->attributes->lottery_img }}" name="billing_lot_img" required>
                                <input type="hidden" value="{{ $order->price }}" name="billing_price" required>
                                <input type="hidden" value="{{ \Cart::getTotalQuantity() }}" name="quantity" required>
                                <input type="hidden" value="{{ Cart::getTotal() + 20 * Cart::getTotalQuantity() }}" name="total_price" required>
                                <input type="hidden" value="{{ Auth::user()->username}}" name="username" required>
                                <input type="hidden" value="{{ Auth::user()->first_name}}" name="fist_name" required>
                                <input type="hidden" value="{{ Auth::user()->last_name}}" name="last_name" required>
                                <input type="hidden" value="{{ Auth::user()->user_phone}}" name="phone" required>
                                <input type="hidden" value="{{ Auth::user()->user_address}}" name="address" required>
                                @endforeach
                                <button type="submit" class="btn-pay" id="btnPayCod">{{__('ยืนยัน')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- End Content -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
    /*Dropdown Menu*/

    // $('#payment').change(function() {
    //     if ($('#payment').val = 'cod') {
    //         alert('yes');
    //     } else {
    //         alert('not');
    //     }
    // })
    function changePayment() {
        document.getElementById('btnPayOrder').style.display = 'none';
        document.getElementById('submitCod').style.display = 'block';
    }

    function changePaymentBack() {
        document.getElementById('btnPayOrder').style.display = 'block';
        document.getElementById('submitCod').style.display = 'none';
    }
    // $('#btnPayCod').hide();
    $('#payment').change(function() {
        if ($(this).val() == 'cod') {
            // document.getElementById('btnPayOrder').style.display = 'none';
            // document.getElementById('submit-cod').style.display = 'block';
            // $('#btnPayOrder').hide();
            // $('#btnPayCod').show();
            changePayment()

        } else {
            // document.getElementById('btnPayOrder').style.display = 'block';
            // document.getElementById('submit-cod').style.display = 'none';
            // $('#btnPayOrder').show();
            // $('#btnPayCod').hide();
            changePaymentBack()

        }
    });
</script>

@endsection