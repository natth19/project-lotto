@extends('dashboard.layout')
@section('content')

<style>
    .pagination {
        justify-content: center;
    }
</style>
<button class="btn btn-primary" style="margin:10px;margin-bottom:30px;" id="btn-back" onclick="history.back()">
    < กลับ</button>
        <div>
            <h1>Report</h1>
            <div>
                <h2 style="margin-right: 20px;">เลขท้าย 2 ตัว : {{$num1}}{{$num2}} </h2>
                <h2 style="margin-right: 20px;">ทั้งหมด : {{count($products)}} ใบ</h2>

            </div>
            
        
            
        </div>

        <div>
            <table class="table table-hover" style="text-align: center;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ล็อตเตอรี่</th>
                        <th scope="col">สถานะการขาย</th>

                    </tr>
                </thead>
                <tbody style="text-align: -webkit-center;">
                    @foreach ($products as $key => $value)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{$value->lottery_number}}</td>
                        <td >
                            @if($value->qty === 0)
                            <p style="background:#E74C3C;width: fit-content;">ขายแล้ว</p>
                            @endif
                            @if($value->qty === 1)
                            <p style="background:#2ECC71; width: fit-content;">ยังไม่ขาย</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginate-box">

            </div>

        </div>

        @endsection