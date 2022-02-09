<div class="Footer">
    <div class="menu-footer">
        <a href="{{ route('home') }}" class="link-page" id="home-pages">
            <i class="fa fa-home"></i>
            <p>หน้าแรก</p>
        </a>
        <a href="{{ route('profile') }}" class="link-page" id="profile-pages">
            <i class="fa fa-user-circle"></i>
            <p>ข้อมูลสมาชิก</p>
        </a>
        @if(Auth::user())
        <a href="{{ route('history') }}" class="link-page" id="history-pages">
            <i class="fa fa-history"></i>
            <p>ประวัติการซื้อ</p>
        </a>

        <a href="{{ route('cart.list') }}" class="link-page" id="cart-pages">
            <i class="fa fa-shopping-cart ic-cart"></i>
            @if(Cart::getTotalQuantity() > 0)
            <span class="quantity">{{ Cart::getTotalQuantity()}}</span>
            @endif
            <p>ตะกร้า</p>
        </a>
        @endif
        <a href="/contact" class="link-page" id="contact-pages">
            <i class="fa fa-comment"></i>
            <p>ติดต่อเรา</p>
        </a>
    </div>
</div>


<!-- <script>
    function routeToHome() {
        event.preventDefault();
        const CSRF_TOKEN = $('mete[name="csrf-token"]').attr('content');
        $("#loading-image").hide();

        $.ajax({
            url: '/home',
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            beforeSend: function() {
                $("#loading-image").show();
            },
            success: function(data) {
                // console.log(data)
                
                $("#nav").html(data)
                $("#loading-image").hide();
            }
        })
    }

    function routeToProfile() {
        event.preventDefault();
        const CSRF_TOKEN = $('mete[name="csrf-token"]').attr('content');
        $("#loading-image").hide();

        $.ajax({
            url: '/profile',
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            beforeSend: function() {
                $("#loading-image").show();
            },
            success: function(data) {
                // console.log(data)
                
                $("#nav").html(data)
                $("#loading-image").hide();
            }
        })
    }
    function routeToHistory() {
        event.preventDefault();
        const CSRF_TOKEN = $('mete[name="csrf-token"]').attr('content');
        $("#loading-image").hide();

        $.ajax({
            url: '/history',
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            beforeSend: function() {
                $("#loading-image").show();
            },
            success: function(data) {
                // console.log(data)
                
                $("#nav").html(data)
                $("#loading-image").hide();
            }
        })
    }
    function routeToCart() {
        event.preventDefault();
        const CSRF_TOKEN = $('mete[name="csrf-token"]').attr('content');
        $("#loading-image").hide();

        $.ajax({
            url: '/cart',
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            beforeSend: function() {
                $("#loading-image").show();
            },
            success: function(data) {
                // console.log(data)
                
                $("#nav").html(data)
                $("#loading-image").hide();
            }
        })
    }
    function routeToContact() {
        event.preventDefault();
        const CSRF_TOKEN = $('mete[name="csrf-token"]').attr('content');
        $("#loading-image").hide();

        $.ajax({
            url: '/contact',
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            beforeSend: function() {
                $("#loading-image").show();
            },
            success: function(data) {
                // console.log(data)
                
                $("#nav").html(data)
                $("#loading-image").hide();
            }
        })
    }
</script> -->