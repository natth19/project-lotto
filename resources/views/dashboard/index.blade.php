@extends('dashboard.layout')


@section('content')

<style>
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: auto;
        width: 100%;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }

    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 42px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 88px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }

    .tb-index {
        margin-top: 5%;
    }
</style>

<div class="container">
    <div class="row">

        <div class="col-md-3">
            <a href="{{ route('products') }}">
                <div class="card-counter primary">
                    <i class="fa fa-ticket"></i>
                    <span class="count-numbers">{{count($count_prd)}}</span>
                    <span class="count-name">Lottery</span>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="{{ route('orders') }}">
                <div class="card-counter danger">
                    <i class="fa fa-code-fork"></i>
                    <span class="count-numbers">{{count($count_order)}}</span>
                    <span class="count-name">จำนวน orders</span>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('orders') }}">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers">{{count($count_orderPrd)}}</span>
                    <span class="count-name">จำนวนการสั่งซื้อ</span>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('members') }}">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">{{count($count_member)}}</span>
                    <span class="count-name">สมาชิก</span>
                </div>
            </a>
        </div>
    </div>

    <!-- <div class="tb-index">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div> -->
</div>



@endsection