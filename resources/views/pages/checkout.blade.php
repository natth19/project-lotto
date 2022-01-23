<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>โอ่งข้าวโอ่งน้ำพารวย</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/checkout.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <script src="{{ asset('/js/function.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    @livewireStyles
</head>
<style>
    .container {
        padding: 0;
    }
</style>

<body>

    <div class="container page-set">
        <div style="text-align: center;">
            <div style="font-size: 20px; color:red; ">โปรดชำระเงินภายในเวลาที่กำหนด <br>
                <span id="time">29:59</span>
                <form action="{{ route('cart.clear') }}" method="POST" id="deleteCart">
                    @foreach ($cartItems as $order)
                    @csrf
                    <input type="hidden" value="{{ $order->id }}" name="id">
                    <button id="clearCart" type="submit" style="display: none;"></button>
                    @endforeach
                </form>
            </div>

        </div>
        <form action="{{ route('cart.checkout') }}" method="POST" enctype="multipart/form-data">
            <div class="qrCodeScan_normal" id="showPrompay" style="display: block;">
                <p class="textHeadQR">Scan QRCode หรือ โอนเงินไปยังเลขบัญชีด้านล่าง และอัปโหลดสลิปหลักฐานการโอนเงิน</p>
                <img class="img-pmt" src="https://www.blognone.com/sites/default/files/externals/f66bf4f89896f0cc4802b76120a363c3.jpg" alt="Prompay" width="450px" height="auto">


                <div class="importFile">
                    <label for="slip_img">กรุณาอัปโหลดสลิปโอนเงิน</label><span style="color: red;">*</span>
                    <input type="file" id="slip_img" name="slip_img" accept="image/*" required>
                    <input type="hidden" name="payment" value="PromptPay">
                </div>
            </div>

            <div class="button-submit">
                @foreach ($cartItems as $order)
                @csrf
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
                <button type="submit" class="btnSubmit">{{__('ยืนยัน')}}</button>
            </div>
        </form>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <div class="button-cancel">
                <input type="hidden" value="{{ $order->id }}" name="id">
                <button type="submit" class="btnCancel">{{__('ยกเลิก')}}</button>
            </div>
        </form>


    </div>


    <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            var clear = document.getElementById('clearCart');
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clear.click();
                }
            }, 1000);
        }




        window.onload = function() {
            // var fiveMinutes = 60 * 1,
            var fiveMinutes = 1799,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://www.gstatis.com/firebasejs/6.0.2/firebase.js"></script> -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
</body>

</html>