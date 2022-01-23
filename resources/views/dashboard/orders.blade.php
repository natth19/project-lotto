@extends('dashboard.layout')
@section('content')
<style>
	.btn-status-check {
    /* margin: 10px; */
    display: flex;
}
.btn-status-check button{
    margin: 4px;
    margin-bottom: 8px;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}
</style>
<div>
    <h2>รายการคำสั่งซื้อ</h2>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif

    <!-- <form action="{{ route('orders.search') }}" method="get">
        <select name="status" id="status" class="form-select form-select-lg mb-3 sel-order" aria-label=".form-select-lg">
            <option value="">All</option>
            <option value="pending">pending</option>
            <option value="processing">processing</option>
            <option value="completed">completed</option>
            <option value="decline">decline</option>
        </select>
        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
    </form> -->
    <div class="btn-status-check">

        <form action="{{ route('orders.search') }}" method="get">
            <input type="hidden" value="" name="all">
            <button type="submit" style="background: #5DADE2;" id="btn btn-check-all">ทั้งหมด</button>
        </form>
        
        <form action="{{ route('orders.search') }}" method="get">
            <input type="hidden" value="pending" name="pending">
            <button type="submit" style="background: #B3B6B7;" id="btn btn-check-pending">รอดำเนินการ</button>
        </form>
        <form action="{{ route('orders.search') }}" method="get">
            <input type="hidden" value="processing" name="processing">
            <button type="submit" style="background: #F4D03F;" id="btn btn-check-process">กำลังตรวจสอบ</button>
        </form>
        <form action="{{ route('orders.search') }}" method="get">
            <input type="hidden" value="completed" name="completed">
            <button type="submit" style="background: #2ECC71;" id="btn btn-check-success">ยืนยันคำสั่งซื้อแล้ว</button>
        </form>
        <form action="{{ route('orders.search') }}" method="get">
            <input type="hidden" value="decline" name="decline">
            <button type="submit" style="background: #E74C3C;" id="btn btn-check-decline">ปฏิเสธคำสั่งซื้อ</button>
        </form>

    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">เลข Order</th>
                <th scope="col">Status</th>
                <th scope="col">จำนวน</th>
                <th scope="col">รูปการชำระ</th>
                <th scope="col">ราคารวม</th>
                <th scope="col">วัน/เวลา สั่งซื้อ</th>
                <th scope="col">Action</th>
                <!-- <th scope="col">test</th> -->

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $key => $value)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{ $value->id }}</td>
                <td>
                    @if($value->status === 'pending')
                    <p class="status-show" id="statusShow" style="background:#B3B6B7;">รอดำเนินการ</p>
                    @endif
                    @if($value->status === 'processing')
                    <p class="status-show" id="statusShow" style="background:#F4D03F;">กำลังตรวจสอบ</p>
                    @endif
                    @if($value->status === 'completed')
                    <p class="status-show" id="statusShow" style="background:#2ECC71;">ยืนยันคำสั่งซื้อแล้ว</p>
                    @endif
                    @if($value->status === 'decline')
                    <p class="status-show" id="statusShow" style="background:#E74C3C;">ปฏิเสธคำสั่งซื้อ</p>
                    @endif
                </td>
                <td>{{ $value->quantity }}</td>
                @if($value->payment === 'COD')
                <td>ชำระปลายทาง</td>
                @endif
                @if($value->payment === 'PromptPay')
                <td>PromptPay</td>
                @endif
                <td>{{ $value->total_price }}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a href="{{ route('ordersDetail', $value->id) }}" class="btn btn-primary">ตรวจสอบ</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection