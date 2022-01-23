@extends('dashboard.layout')
@section('content')

<div class="member-class">
    <h2>Members</h2>
    <div class="search-lot-prd" style="text-align: left;">

        <form action="{{ route('member.search') }}" method="get">
            <label for="number">Filter</label>
            <input class="edit-data" name="memberSch" id="memberSch" type="text" maxlength="255">
            <button type="submit" style="border: none;background:none;"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <table class="table">
        <caption>List of users</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <!-- <th scope="col">Username</th> -->
                <th scope="col">ชื่อ</th>
                <th scope="col">นามสกุล</th>
                <th scope="col">เบอร์โทร</th>
                <th scope="col">ระดับสมาชิก</th>
                <th scope="col">ที่อยู่</th>
                <!-- <th scope="col">วันที่สมัครสมาชิก</th> -->
                <th scope="col" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $key => $value)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <!-- <td>{{ $value->user_phone}}</td> -->
                <td>{{ $value->first_name}}</td>
                <td>{{ $value->last_name}}</td>
                <td>{{ $value->user_phone}}</td>
                <!-- <td>{{ $value->user_address}}</td> -->
                <td>
                    @if($value->user_status === 'Normal')
                    <p class="status-show" id="statusShow" style="background:#B3B6B7;">ทั่วไป</p>
                    @endif
                    @if($value->user_status === 'VIP')
                    <p class="status-show" id="statusShow" style="background:#F4D03F;">VIP</p>
                    @endif
                </td>

                <td id="is_vip">{{ $value->user_address}}</td>
                <!-- <td>{{ $value->created_at}}</td> -->
                <td style="text-align: center;">
                    <a href="{{ route('memberDetail', $value->id) }}" class=""><i class='fa fa-edit' style='font-size:36px'></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $members->links() !!}
</div>
<script>
    status = document.getElementById('is_vip')
    if (status.val() == 1) {
        after("Vip");
    } else {
        'member';
    }
</script>


@endsection