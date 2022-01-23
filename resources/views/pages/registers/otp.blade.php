<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/otp.css">
    <link rel="stylesheet" href="/css/Footer.css">
    <link rel="stylesheet" href="/css/Header.css">
</head>
<body>
    <!-- Start Header -->
    <div class="Header">
                <div class="NavHeader">
                    <div class="LogoHeader">
                        <img src="/images/logo.png"></img>
                    </div>
                    <div class="TextHeadCenter">
                        <p>@ ร า ช บุ รี</p>
                    </div>
                    <button class="menu-toggle" onClick={burger}   >
                        <i class="fa fa-bars"></i>
                    </button>
            </div>

            <ul id="menu" class='menu-links'>
                {navigation.map((nav) => (
                <li key={nav.text}>
                    <a href={nav.link}><img src={nav.imgIcon}></img> {nav.text}</a>
                </li>
                ))}
            </ul>
        </div>
    <!-- END Header -->

    <!-- Content -->
            <div class="page-otp">
                <div class="head-text-otp">
                    <h1>ยืนยันเบอร์โทรศัพท์</h1>
                    <p>กรุณาระบุรหัส OTP ที่ส่งไปยังหมายเลข</p>
                    <p> {phone_num} </p>
                    <hr/>
                </div>
                <div class="otp-input-box">
                    <input class="input-otp" type="tel" maxLength="1"/>
                    <input class="input-otp" type="tel" maxLength="1"/>
                    <input class="input-otp" type="tel" maxLength="1"/>
                    <input class="input-otp" type="tel" maxLength="1"/>
                    <p class="time-out">{timer} นาที</p>
                    
                    <button class="btn-conf-otp">ยืนยันตัวตน</button><br/>
                    
                    <button class="get-otp">ขอเลข OTP อีกครั้ง</button>
                </div>
                
            </div>
    <!-- End Content -->


    <!-- Footer -->
    <div class="Footer">
            <div class="menu-footer">
            <a href="/" class="link-page">
                        <i class="fa fa-home"></i>
                        <p>หน้าแรก</p>
                    </a>
                
                    <a href="/profile" class="link-page">
                        <i class="fa fa-user-circle"></i>
                        <p>ข้อมูลสมาชิก</p>
                    </a>
                
                    <a href="/history" class="link-page">
                        <i class="fa fa-history"></i>
                        <p>ประวัติการซื้อ</p>
                    </a>
               
                    <a href="/cart" class="link-page">
                        <i class="fa fa-shopping-cart"></i>
                        <p>ตะกร้า</p>
                    </a>
                
                    <a href="/contact" class="link-page">
                        <i class="fa fa-comment"></i>
                        <p>ติดต่อเรา</p>
                    </a>
                
            </div>
        </div>
        <!-- END Footer -->

</body>
</html>