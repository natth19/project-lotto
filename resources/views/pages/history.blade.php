@extends('pages.app')

@section('content')
<link rel="stylesheet" href="/css/history.css">
<!-- Content -->

<div class="historyPage">
    <h1>การสั่งซื้อของฉัน</h1>
    <div>
        @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
        @endif
    </div>
    
    @foreach($data as $row)
    
    <div class="card-order">
        
        <div class="statusOrder">
            <p>สถานะ : {{ $row->status }}</p>
            <div class="line"></div>
            <div class="order">
                <div class="Card-Lottery-Order">
                    <img class="lottery" src="{{$row->lottery_img}}" width="285px" max-height="141px"></img>
                </div>
                <div class="detail-order">
                    <table>
                        <tr>
                            <td class="detail-title">เลขที่เลือก</td>
                            <td class="detail-result">{{$row->lottery_number}}</td>
                        </tr>
                        <tr>
                            <td class="detail-title">จำนวน/ใบ</td>
                            <td class="detail-result">{{ $row->lottery_type }}</td>
                        </tr>
                        <tr>
                            <td class="detail-title">ราคาฉลาก</td>
                            <td class="detail-result">80 ฿</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @endforeach
    
</div>

@endsection