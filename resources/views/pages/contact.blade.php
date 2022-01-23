@extends('pages.app')


@section('content')
<link rel="stylesheet" href="/css/contact.css">
<!-- Content -->
<div class="container-contact">
    <div class="page-company">
        <div class="image-company">
            <img class="img-com" src="/images/logo.png" style="max-width: 30%; height:auto;"></img>
        </div>
    </div>
    <div class="info">
        <h2><i class="fa fa-building"></i> ติดต่อเรา</h2>
        <div class="card-contact">
            <h3>ช่องทางการติดต่อ</h3>
            <hr>
            <div class="box-contact">
                <div class="contact-us">
                    <img class="icon-social" src="../images/ic-facebook.png" />
                    <a href="https://www.facebook.com/">ล็อตเตอรี่@ราชบุรี</a>
                </div>
                <div class="contact-us">
                    <img class="icon-social" src="../images/ic-line.png" />
                    <a href="http://line.me/ti/p/">@rashburee</a>
                </div>
                <div class="contact-us">
                    <img class="icon-social" src="../images/ic-phone.png" />
                    <span>099-999-9999</span>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection