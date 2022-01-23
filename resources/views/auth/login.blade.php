@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/login_main.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container container-login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
            <!-- <div class="card-header">{{ __('Login') }}</div> -->
            <div style="text-align:center;">
                <a href="/">
                    <img class="logo_login" src="/images/logo.png" alt="โอ่งข้าวโอ่งน้ำพารวย" style="max-width: 150px;height:auto;"></a>
            </div>
            <div class="box-login">
                <h1>เข้าสู่ระบบ</h1>

                <div class="card-body">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <!-- <div class="col-md-6"> -->
                            <input id="user_phone" type="tel" maxlength="10" inputmode="numeric" placeholder="กรุณากรอกเบอร์โทรศัพท์" class="user-id @error('user_phone') is-invalid @enderror" name="user_phone" value="{{ old('user_phone') }}" required autocomplete="user_phone" autofocus>

                            @error('user_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <!-- </div> -->
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <!-- <div class="col-md-6"> -->
                            <input id="password" placeholder="กรุณากรอกรหัสผ่าน" type="password" class="user-pass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <!-- </div> -->
                        </div>

                        <!-- <div class="form-group row"> -->
                        <!-- <div class="col-md-6 offset-md-4"> -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label h5" for="remember">
                                {{ __('จดจำรหัสผ่านของฉัน') }}
                            </label>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->

                        <!-- <div class="form-group row mb-0"> -->
                        <!-- <div class="col-md-8 offset-md-4"> -->
                        <button type="submit" class="btn-login">
                            {{ __('เข้าสู่ระบบ') }}
                        </button>


                        <!-- </div> -->
                        <!-- </div> -->
                    </form>
                    @if (Route::has('register'))
                    <a href="{{ url('/register') }}">
                        <button type="button" class="btn-register">
                            {{ __('สมัครสมาชิก') }}
                        </button>
                    </a>
                    @endif
                    <br>
                    <div class="btn-link">
                        @if (Route::has('password.request'))
                        <a class="btn-forgot-pass h5" href="{{ route('password.request') }}" hidden>
                            {{ __('ลืมรหัสผ่าน ?') }}
                        </a>
                        @endif
                        <a class="btn-back h5" href="{{ route('home') }}" hidden>
                            {{ __('ย้อนกลับ') }}
                        </a>

                    </div>

                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>

@endsection