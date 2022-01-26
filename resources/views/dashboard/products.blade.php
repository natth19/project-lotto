@extends('dashboard.layout')
@section('content')

<style>
    .pagination {
        justify-content: center;
    }
</style>
<div>
    <h2>ล็อตเตอรี่ที่วางขาย</h2>
</div>

<!-- <div style="text-align: end;">
    ค้นหาเลข <input type="text">
</div><br> -->
<div class="text-prd-p">
    <p class="total-prd">ทั้งหมด : {{count($count_prd)}}</p>
    <p class="soldOut-prd">ขายแล้ว : {{count($count_prdSoldOut)}}</p>
    <p class="now-prd">เหลือ : {{count($count_prdHave)}}</p>

</div>

<div class="search-lot-prd" style="text-align: left;">
    <form action="{{ route('products.search') }}" method="get">
        <label for="number">ค้นหาเลข</label>
        <input class="edit-data" name="number" id="number" type="tel">
        <button type="submit" style="border: none;background:none;"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="search-lot-prd" style="text-align: left;">
    <form action="{{ route('products.search2last') }}" method="get">
        <label for="number">ค้นหาเลขท้าย 2 ตัว</label>
        <input class="edit-data" name="last2num1" id="last2num1" type="tel" style="width: 40px;text-align: center;" maxlength="1">
        <input class="edit-data" name="last2num2" id="last2num2" type="tel" style="width: 40px;text-align: center;" maxlength="1">
        <button type="submit" style="border: none;background:none;"><i class="fa fa-search"></i></button>
    </form>
    <!-- <p> จำนวนเลขท้าย 2 ตัว : count $products</p> -->
</div>
<br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div>
    <table class="table table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">QR-CODE</th>
                <th scope="col">เลข</th>
                <th scope="col">ประเภทชุด/ใบ</th>
                <th scope="col">งวด</th>
                <th scope="col">ชุด</th>
                <th scope="col">ปี</th>
                <th scope="col">วันที่ออกรางวัล</th>
                <th scope="col">จำนวนที่มีอยู่</th>
                <th scope="col">สถานะ</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $value)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{$value->id}}</td>
                <td>{{$value->lottery_number}}</td>
                <td>{{$value->lottery_type}}</td>
                <td>{{$value->lottery_round}}</td>
                <td>{{$value->lottery_set}}</td>
                <td>{{$value->lottery_year}}</td>
                <td>{{$value->lottery_date}}</td>
                <td>{{$value->qty}}</td>
                <td>
                    @if($value->qty === 0)
                    <p style="background:#E74C3C;">ขายแล้ว</p>
                    @endif
                    @if($value->qty === 1)
                    <p style="background:#2ECC71;">ยังไม่ขาย</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginate-box">
        {!! $products->links() !!}
    </div>

</div>

@endsection