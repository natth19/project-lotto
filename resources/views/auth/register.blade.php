@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/Register.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ลงทะเบียนผู้ใช้ใหม่') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->


                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_phone" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>

                            <div class="col-md-6">
                                <input id="user_phone" type="tel" maxlength="10" class="form-control @error('user_phone') is-invalid @enderror" name="user_phone" value="{{ old('user_phone') }}" required autocomplete="user_phone" autofocus>

                                @error('user_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_phone" class="col-md-4 col-form-label text-md-right">{{ __('ธนาคาร') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="user_phone" type="tel" maxlength="10" class="form-control @error('user_phone') is-invalid @enderror" name="user_phone" value="{{ old('user_phone') }}" required autocomplete="user_phone" autofocus> -->
                                <select name="txtBank" class="form-control @error('bankType') is-invalid @enderror" id="bankType" name="bankType" required autocomplete="bankType" autofocus>
                                    <option>--โปรดเลือกธนาคาร--</option>
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                    <option value="ธนาคารกรุงศรี">ธนาคารกรุงศรี</option>
                                    <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                    <option value="ธนาคารไทยพานิชย์">ธนาคารไทยพานิชย์</option>
                                    <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                                    <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                                    <option value="ธนาคารสแตนดาร์ดชาร์เตอร์">ธนาคารสแตนดาร์ดชาร์เตอร์</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_account_number" class="col-md-4 col-form-label text-md-right">{{ __('เลขบัญชีธนาคาร') }}</label>

                            <div class="col-md-6">
                                <input id="bank_account_number" type="tel" maxlength="20" class="form-control @error('bank_account_number') is-invalid @enderror" name="bank_account_number" value="{{ old('bank_account_number') }}" required autocomplete="bank_account_number" autofocus>

                                @error('bank_account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_address" class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่') }}</label>

                            <div class="col-md-6">
                                <textarea id="user_address" type="text" class="form-control @error('user_address') is-invalid @enderror" name="user_address" value="{{ old('user_address') }}" required autocomplete="user_address" rows="3" cols="30"></textarea>

                                @error('user_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('กรุณากรอกรหัสผ่านอีกครั้ง') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('สมัครสมาชิก') }}
                                </button>
                                <a href="{{ route('login') }}">
                                    <button type="button" class="btn btn-secondary">
                                        {{ __('ยกเลิก') }}
                                    </button>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection