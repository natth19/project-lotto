@extends('pages.app')

@section('content')
<link rel="stylesheet" href="/css/profile.css">
@if(Auth::user())
<!-- Content -->


<div class="container-profile">
    <div class="page-profile">
        <div class="image-profile">
            <img class="img-pro" src="https://www.lopburicancer.in.th/img/user.png" style="max-width:50%;height: auto;"></img>
        </div>
    </div>
    <div class="info">
        <h2><i class="fa fa-user-circle size-5x"></i> ข้อมูลส่วนตัว</h2>
        
        <div class="card-user">
            <div class="details-user">
                <ul class="user">
                    <li>ชื่อ : {{ $user->first_name }}</li>
                    <li>นามสกุล : {{ $user->last_name }}</li>
                    <li>เบอร์โทร : {{ $user->user_phone }}</li>
                </ul>
                <div class="line"></div>
                <div class="address">
                    <p>ที่อยู่ : {{ $user->user_address }}</p>
                </div>
				<div class="line"></div>
                <ul class="bank" style="list-style-type: none;padding:0;margin: 10px;">
                    <li>ธนาคาร : {{ $user->bankType }}</li>
                    <li>หมายเลข : {{ $user->bank_account_number }}</li>
                </ul>
            </div>
        </div>
        <div class="btnPro">
            <a href="{{ route('profile.edit', $user->username, $user->id ) }}">
                <button class="btnEditProfile">แก้ไขข้อมูลส่วนตัว</button>
            </a>
        </div>
    </div>
</div>
@endif

@if(!Auth::user())

<div class="container non-login">
    
    <label>กรุณาเข้าสู่ระบบ</label>
    <br>
    <div class="btn">
        <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
    </div>


</div>
@endif
@endsection