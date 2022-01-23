@extends('dashboard.layout')

@section('content')

<div>
    <div class="row mt-2">
        <div class="col-md-4">
            <h2>รายละเอียดสมาชิก</h2>
            <a href="{{ route('members') }}" class="btn my-3"><i class="fa fa-chevron-left"></i>{{ __(' กลับ') }}</a>
        </div>
    </div>

    <div class="card-form-member">
        <form action="{{ route('member.update', $member->id) }}" method="post">
            @csrf
            <div style="text-align: left;">
                <label for="user_status" style="font-size: 20px;margin-right:10px;">ระดับสมาชิก</label>
                <select id="user_status" name="user_status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="font-size: 20px;width:120px;text-align:center;">
                    <!-- <option value="" id="sts-1" >-- สถานะ Order --</option> -->
                    <option value="Normal" {{$member->user_status == "Normal" ? 'selected' : ''}}>ทั่วไป</option>
                    <option value="VIP" {{$member->user_status == "VIP" ? 'selected' : ''}}>VIP</option>
                </select>
                <input type="hidden" name="member_id" value="{{ $member->id }}">

                <button name="btn-sts" type="submit" style="margin-left: 5px;" class="btn btn-primary">ยืนยัน</button>

            </div>
        </form>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">ชื่อ</label>
                <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="{{ $member->first_name }}" disabled>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">นามสกุล</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="{{ $member->last_name }}" disabled>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault02">โทรศัพท์</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="{{ $member->user_phone }}" disabled>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefaultUsername">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" value="{{ $member->username }}" disabled>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationDefault03">ที่อยู่</label>
                <input type="text" class="form-control" id="validationDefault03" placeholder="-" value="{{ $member->user_address }}" disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">ธนาคาร</label>
                <input type="text" class="form-control" id="validationDefault03" placeholder="-" value="{{ $member->bankType }}" disabled>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault03">หมายเลขธนาคาร</label>
                <input type="text" class="form-control" id="validationDefault03" placeholder="-" value="{{ $member->bank_account_number }}" disabled>
            </div>
        </div>



    </div>

</div>

@endsection