@extends('pages.app')


@section('content')
<link rel="stylesheet" href="/css/Register.css">
<!-- Content -->
<div class="container">
    <div class="box-register">
        <h1>กรอกข้อมูลเพื่อสมัครสมาชิก</h1>
        <form class="register-form" method="post">
            <input type="text" class="user-firstName" placeholder="ชื่อ" required />
            <input type="text" class="user-lastName" placeholder="นามสกุล" required />
            <input type="tel" class="user-tel" placeholder="เบอร์โทร" required />
            <textarea type="text" class="user-address" placeholder="ที่อยู่สำหรับจัดส่ง"  required ></textarea>
            <input type="password" id="user-pass" class="user-pass" minLength="6" placeholder="กรุณาตั้งรหัสผ่าน" required />
            <p class="conf-text">*ยืนยันรหัสผ่านอีกครั้ง</p>
            <input type="password" id="user-pass-conf" class="user-pass-conf" minlength="6" onFocus="user-pass" placeholder="ยืนยืนรหัสผ่านอีกครั้ง" required />

            <button type="submit" class="btn-register-next" onClick={_register}>ดำเนินการต่อ</button>

        </form>

        <button class="btn-login-page">เป็นสมาชิกอยู่แล้ว ?</button>

    </div>
</div>
<!-- End Content -->


<!-- Footer -->
<div class="Footer">
    <div class="menu-footer">
        <a href="{{route('pages.index')}}" class="link-page" id="home-pages">
            <i class="fa fa-home"></i>
            <p>หน้าแรก</p>
        </a>
        <a href="/profile" class="link-page" id="profile-pages">
            <i class="fa fa-user-circle"></i>
            <p>ข้อมูลสมาชิก</p>
        </a>
        <a href="/history" class="link-page" id="history-pages">
            <i class="fa fa-history"></i>
            <p>ประวัติการซื้อ</p>
        </a>
        <a href="/cart" class="link-page" id="cart-pages">
            <i class="fa fa-shopping-cart"></i>
            <p>ตะกร้า</p>
        </a>
        <a href="/contact" class="link-page" id="contact-pages" style="color:#e0b600;">
            <i class="fa fa-comment"></i>
            <p>ติดต่อเรา</p>
        </a>
    </div>
</div>
<!-- END Footer -->

@endsection