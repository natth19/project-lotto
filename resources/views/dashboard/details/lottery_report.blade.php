@extends('dashboard.layout')
@section('content')

<style>
    .pagination {
        justify-content: center;
    }
</style>
<div>
    <h1>Report</h1>
    <h2>ผลการค้นหา : </h2>
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
        <tbody>
            
            <tr >
                <th scope="row">1</th>
                <td>554745</td>
                <td>ขายแล้ว</td>
            </tr>
            <tr >
                <th scope="row">2</th>
                <td>77877</td>
                <td>ยังไม่ถูกขาย</td>
            </tr>
            
        </tbody>
    </table>
    <div class="paginate-box">
     
    </div>

</div>

@endsection