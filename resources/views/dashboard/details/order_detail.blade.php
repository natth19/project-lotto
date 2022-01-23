@extends('dashboard.layout')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <h2>รายละเอียดคำสั่งซื้อ</h2>
        <a href="{{ route('orders') }}" class="btn btn-primary my-3"><i class="fa fa-chevron-left"></i>{{ __(' กลับ') }}</a>
    </div>
</div>

<div class="row">
    <div class="card p-3">
        <div style="display: grid; grid-template-columns: 1fr 1fr ">
            <div class="card-title">

                <strong>หมายเลขสั่งซื้อ : {{ $orders->id }}</strong> <span class="status-order"> {{ $orders->status}}</span>
            </div>

            <!-- Form update status -->
            <form action="{{ route('order.update', $orders->id) }}" method="post">
                @csrf
                <div style="text-align: end;">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <!-- <option value="" id="sts-1" >-- สถานะ Order --</option> -->
                        <option value="pending"{{$orders->status == "pending" ? 'selected' : ''}}>รอดำเนินการ</option>
                        <option value="processing"{{$orders->status == "processing" ? 'selected' : ''}}>กำลังดำเนินการ</option>
                        <option value="completed"{{$orders->status == "completed" ? 'selected' : ''}}>สำเร็จ</option>
                        <option value="decline"{{$orders->status == "decline" ? 'selected' : ''}}>ไม่ผ่านการตรวจสอบ</option>
                    </select>
                    <input type="hidden" name="order_id" value="{{ $orders->id }}">
                    
                    <button name="btn-sts" type="submit" style="margin-left: 20px;" class="btn btn-primary" >ยืนยัน</button>
                    
                </div>
            </form>

        </div>
        <div class="card-text">
            <div class="card-order-detail">
                @foreach($data as $key => $value)
                <div class="image-lottery">
                    <div class="lot-img">
                        <img class="lottery-1" src="{{$value->lottery_img}}">
                    </div>
                </div>
                @endforeach
                
          
            </div>
            <div class="order-detail-cus">
                <strong>จำนวนล็อตเตอรี่ :</strong> {{$orders->quantity}}
                <strong style="margin-left: 50px;">ยอดรวม :</strong> {{$orders->total_price}} <strong>บาท</strong>
                <strong style="margin-left: 50px;">การชำระเงิน :</strong> {{$orders->payment}}<br>

                <strong>ชื่อ :</strong><span> {{ $orders->fist_name}} </span>
                <strong style="margin-left: 50px;">นามสกุล :</strong><span> {{ $orders->last_name}} </span> <br>
                <strong>เบอร์ติดต่อ :</strong> {{ $orders->phone}} <br>
                <strong>ที่อยู่สำหรับจัดส่ง :</strong> {{ $orders->address}} <br>

                <button class="btn">สลิปโอนเงิน</button>
                <table class="table table-hover" style="width: 60%;">
                    <thead style="background:rgb(252, 205, 52);">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">เลข</th>
                            <th scope="col">ชุด/ใบ</th>
                            <th scope="col">วันที่ออกรางวัล</th>
                            <!-- <th scope="col">test</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{ $value->lottery_number }}</td>
                            <td>{{ $value->lottery_type }}</td>
                            <td>{{ $value->lottery_date_forward }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                <!-- <img class="slip-img" onclick="imgEnlarge(this)" onclick="imgAssign()" src="/images/slip_payment.jpg" alt=""> -->
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    img {
        width: 300px;
    }
</style>



@endsection