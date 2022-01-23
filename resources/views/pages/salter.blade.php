@extends('pages.app');

@section('content');
<style>
    .page-salter{
        margin: 0 2rem;
        margin-top: 100px;
        text-align: center;
    }
</style>
<div class="page-salter">
    <h1>ขออภัย ❌</h1>
    <h2>ระบบยังไม่พร้อมใช้งานในขณะนี้</h2>
</div>




<!-- Footer -->
<div class="Footer">
        <div class="menu-footer">
            <a href="{{route('pages.index')}}" class="link-page" id="home-pages" style="color:#e0b600;">
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
            <a href="/contact" class="link-page" id="contact-pages">
                <i class="fa fa-comment"></i>
                <p>ติดต่อเรา</p>
            </a>
        </div>
    </div>
    <!-- END Footer -->

@endsection;