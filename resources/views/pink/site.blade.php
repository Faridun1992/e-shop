<!DOCTYPE html>
<html>
<head>

    <link href="{{ asset('pink') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!--Custom-Theme-files-->
    <!--theme-style-->
    <link href="{{ asset('pink') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--start-menu-->
    <link href="{{ asset('pink') }}/css/memenu.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    <div class="box">

                            <option class="label">USD</option>

                    </div>
                    <div class="btn-group">
                        <a class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @auth
                                <li><a href="">Добро пожаловать  {{ Auth::user()->name }}</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="center-block">
                                        {{ __('Выйти') }}
                                    </button>
                                </form>

                            @else
                                <li><a href="{{route('login')}}">Вход</a></li>
                                <li><a href="{{route('register')}}">Регистрация</a></li>
                            @endauth
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="{{ route('cartIndex') }}">
                        @csrf
                        <div class="total">
                            <span>${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></div>
                        <img src="{{ asset('pink') }}/images/cart-1.png" alt="" />
                    </a>
                    <p><a href="{{ asset('pink') }}/javascript:;" class="simpleCart_empty">{{ (\Gloudemans\Shoppingcart\Facades\Cart::content()->count() > 0) ? \Gloudemans\Shoppingcart\Facades\Cart::content()->count().' шт' : 'Пустая корзина' }}</a></p>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="preloader"><img src="{{asset('pink')}}/images/ring.svg" alt=""></div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="{{route('home')}}"><h1>Luxury Watches</h1></a>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue"><li class="active"><a href="{{route('home')}}">Home</a></li>
                       @yield('navigation')
                    </ul>
                </div>

                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form method="GET" action="{{route('search')}} ">
                    <input type="text" value="Search" name="search">
                    <input type="submit" value="">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->

<div class="content">
    @yield('content')
</div>

<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Information</h3>
                <ul>
                    <li><a href="#"><p>Specials</p></a></li>
                    <li><a href="#"><p>New Products</p></a></li>
                    <li><a href="#"><p>Our Stores</p></a></li>
                    <li><a href="contact.html"><p>Contact Us</p></a></li>
                    <li><a href="#"><p>Top Sellers</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>My Account</h3>
                <ul>
                    <li><a href="account.html"><p>My Account</p></a></li>
                    <li><a href="#"><p>My Credit slips</p></a></li>
                    <li><a href="#"><p>My Merchandise returns</p></a></li>
                    <li><a href="#"><p>My Personal info</p></a></li>
                    <li><a href="#"><p>My Addresses</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Store Information</h3>
                <h4>The company name,
                    <span>Lorem ipsum dolor,</span>
                    Glasglow Dr 40 Fe 72.</h4>
                <h5>+955 123 4567</h5>
                <p><a href="mailto:example@email.com">contact@example.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
@yield('footer')
<!--footer-end-->
<script src="{{ asset('pink') }}/js/jquery-1.11.0.min.js"></script>
<script src="{{ asset('pink') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('pink') }}/js/main.js"></script>
<script src="{{ asset('pink') }}/js/simpleCart.min.js"> </script>
<script type="text/javascript" src="{{ asset('pink') }}/js/memenu.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<!--dropdown-->
<script src="{{ asset('pink') }}/js/jquery.easydropdown.js"></script>
<script type="text/javascript">
	$(function() {

	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');

	    menu_ul.hide();

	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });

	});
</script>

<script src="{{ asset('pink') }}/js/imagezoom.js"></script>
<script defer src="{{ asset('pink') }}/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="{{ asset('pink') }}/css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
     animation: "slide",
     controlNav: "thumbnails"
      });
        });
</script>
<!--Slider-Starts-Here-->
<script src="{{ asset('pink') }}/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!--End-slider-script-->
</body>
</html>
