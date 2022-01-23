@extends('pages.app')


@section('content')
<link rel="stylesheet" href="/css/login.css">

<!-- Content -->
<div class="container">
    <div class="box-login">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            <h1>เข้าสู่ระบบ</h1>
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <input id="user_phone" type="tel" maxlength="10" inputmode="numeric" placeholder="กรุณากรอกเบอร์โทรศัพท์" class="user-id @error('user_phone') is-invalid @enderror" name="user_phone" value="{{ old('user_phone') }}" required autocomplete="user_phone" autofocus>

            @error('user_phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password" placeholder="กรุณากรอกรหัสผ่าน" type="password" class="user-pass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('จดจำรหัสผ่านของฉัน') }}
                </label>
            </div>
            <button type="submit" class="btn-login">
                {{ __('เข้าสู่ระบบ') }}
            </button>
        </form>
        <Link to="/forgot_password">
        <a class="btn-forgot-pass">ลืมรหัสผ่าน ?</a>
        </Link>
        <hr />
        <p>ยังไม่มีบัญชีผู้ใช่ ?</p>
        <Link to="/register">
        <button class="btn-register">สมัครสมาชิก ?</button>
        </Link>
    </div>

</div>
<!-- End Content -->


@endsection