
<link rel="stylesheet" href="/css/Header.css">
<!-- Start Header -->


<nav class="Header">
    <div class="NavHeader">
        <div class="LogoHeader">
            <img src="/images/logo.png"></img>
            <a class="head-title" href="/">โอ่งข้าวโอ่งน้ำพารวย</a>
        </div>
        <div class="TextHeadCenter">
            <p></p>
        </div>
        <a href="javascript:void(0);" class="icon" id="burgerBtn">
            <i class="fa fa-bars"></i>
        </a>

        @if(!Auth::user())
        <div id="menu-desktop" class='menu-desktop-links-noAuth'>

            <a id="navbarDropdown" class="mb-profile" href="{{ route('login') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-user-circle" style="margin-right: 10px;"></i>
                {{ __('เข้าสู่ระบบ') }}
            </a>
            <!-- <a href="/salters"><i class="fa fa-group" style="margin-right: 10px;"></i>ตัวแทน</a> -->

        </div>
        @endif
        @if(Auth::user())
        <div id="menu-desktop" class='menu-desktop-links'>
            <a id="navbarDropdown" class="nav-link" href="/profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-user-circle" style="margin-right: 10px;"></i>
                {{ Auth::user()->first_name }}
            </a>

            <!-- <a href="/salters"><i class="fa fa-group" style="margin-right: 10px;"></i>ตัวแทน</a> -->
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-in" style="margin-right: 10px;"></i>ออกจากระบบ</a><br>
            <!-- <a href="/register"><i class="fa fa-address-book" style="margin-right: 20px;"></i>สมัครสมาชิก</a><br> -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @endif




    </div>
    @if(!Auth::user())
    <div id="menu" class='menu-links-modal'>
        <div class="modal-content">
            <span class="close" hidden>&times;</span>
            <a id="navbarDropdown" class="mb-profile" href="{{ route('login') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-user-circle" style="margin-right: 10px;"></i>
                {{ __('เข้าสู่ระบบ') }}
            </a>

            <!-- <a href="/salters" class="mb-salters"><i class="fa fa-group" style="margin-right: 20px;"></i>ตัวแทน</a> -->

        </div>
    </div>
    @endif

    <!-- For Mobile -->
    @if(Auth::user())
    <div id="menu" class='modal-fade menu-links-modal'>
        <div class="modal-dialog">
            <div class="modal-content">
                <span class="close" hidden>&times;</span>
                <a id="navbarDropdown" class="mb-profile" href="/profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user-circle" style="margin-right: 10px;"></i>
                    {{ Auth::user()->first_name }}
                </a>

                <!-- <a href="/salters" class="mb-salters"><i class="fa fa-group" style="margin-right: 20px;"></i>ตัวแทน</a> -->
                <a href="{{ route('logout') }}" class="mb-logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-in" style="margin-right: 20px;"></i>ออกจากระบบ</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @endif
</nav>
<!-- END Header -->

