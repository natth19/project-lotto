@extends('pages.app')

@section('content')
<link rel="stylesheet" href="/css/profile.css">
<!-- Content -->
<div class="container-profile">
    <!-- <div class="page-profile">
        <div class="image-profile">
            <img class="img-pro" src="https://www.lopburicancer.in.th/img/user.png" style="max-width:50%;height: auto;"></img>
        </div>
    </div> -->
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

    <div class="info">
        <h2><i class="fa fa-user-circle size-5x"></i> แก้ไขข้อมูลส่วนตัว</h2>
        <form action="{{route('profile.update', $user)}}" method="post">
            @csrf
            <div class="card-user">
                <div class="details-user">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <label class="label-user">ชื่อ :</label>
                    <input class="edit-data" type="text" name="first_name" value="{{ $user->first_name }}"></input>
                    <label class="label-user">นามสกุล :</label>
                    <input class="edit-data" type="text" name="last_name" value="{{ $user->last_name }}"></input>
                    <label class="label-user"> เบอร์โทร : </label>
                    <input class="edit-data" type="text" name="user_phone" value="{{ $user->user_phone }}" disabled></input>

                    <div class="line"></div>
                    <div class="address">
                        <p>ที่อยู่ :</p>
                        <textarea class="edit-address" name="user_address" id="address">{{ $user->user_address }}</textarea>
                    </div>
					<label class="label-user">ธนาคาร :</label>
                    <select class="form-control @error('bankType') is-invalid @enderror" id="bankType" name="bankType" required autocomplete="bankType" autofocus>
                        <option value="ธนาคารกรุงเทพ" {{$user->bankType == "ธนาคารกรุงเทพ" ? 'selected' : ''}}>ธนาคารกรุงเทพ</option>
						<option value="ธนาคารกสิกรไทย" {{$user->bankType == "ธนาคารกสิกรไทย" ? 'selected' : ''}}>ธนาคารกสิกรไทย</option>
                        <option value="ธนาคารกรุงไทย" {{$user->bankType == "ธนาคารกรุงไทย" ? 'selected' : ''}}>ธนาคารกรุงไทย</option>
                        <option value="ธนาคารกรุงศรี" {{$user->bankType == "ธนาคารกรุงศรี" ? 'selected' : ''}}>ธนาคารกรุงศรี</option>
                        <option value="ธนาคารทหารไทย" {{$user->bankType == "ธนาคารทหารไทย" ? 'selected' : ''}}>ธนาคารทหารไทย</option>
                        <option value="ธนาคารไทยพานิชย์" {{$user->bankType == "ธนาคารไทยพานิชย์" ? 'selected' : ''}}>ธนาคารไทยพานิชย์</option>
                        <option value="ธนาคารยูโอบี" {{$user->bankType == "ธนาคารยูโอบี" ? 'selected' : ''}}>ธนาคารยูโอบี</option>
                        <option value="ธนาคารออมสิน" {{$user->bankType == "ธนาคารออมสิน" ? 'selected' : ''}}>ธนาคารออมสิน</option>
                        <option value="ธนาคารสแตนดาร์ดชาร์เตอร์" {{$user->bankType == "ธนาคารสแตนดาร์ดชาร์เตอร์" ? 'selected' : ''}}>ธนาคารสแตนดาร์ดชาร์เตอร์</option>
                        
                    </select>
                    <label class="label-user">หมายเลขธนาคาร :</label>
                    <input class="edit-data" type="text" name="bank_account_number" value="{{ $user->bank_account_number }}"></input>
                </div>
            </div>
            <div class="btnPro">
                <!-- <a href="/profile"> -->
                <button class="btnEditProfile" type="submit">บันทึก</button>
                <!-- </a> -->

            </div>
        </form>
        <a href="{{route('profile')}}">
            <button class="backBtnEdit">ยกเลิก</button>
        </a>
    </div>

</div>

<script>
    function popupSaveProfile() {
        alert("ขณะนี้ระบบยังไม่รองรับการแก้ไขข้อมูลชั่วคราว");
    }
</script>
<!-- End Content -->

<!-- Footer -->
<!-- <div class="Footer">
    <div class="menu-footer">
        <a href="/" class="link-page" id="home-pages">
            <i class="fa fa-home"></i>
            <p>หน้าแรก</p>
        </a>
        <a href="" class="link-page" id="profile-pages" style="color:#e0b600;">
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
</div> -->
<!-- END Footer -->

@endsection