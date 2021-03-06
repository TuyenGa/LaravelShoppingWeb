
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="{!!asset("Site/css/bootstrap.css")!!}" rel="stylesheet" type="text/css" media="all" />
    <link href="{!! asset("Site/css/style.css") !!}" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="{!! asset("Site/css/font-awesome.css") !!}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="{!! asset("Site/js/jquery-1.11.1.min.js") !!}"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{!! asset("Site/js/move-top.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("Site/js/easing.js") !!}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            <p><a href="/">Book Store</a></p>
        </div>
        <div class="agile-login">
            <ul>
                @if (\Illuminate\Support\Facades\Auth::guest())
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/logout"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                {{--<li><a href="/register"> Create Account </a></li>--}}
                {{--<li><a href="/login">Login</a></li>--}}
                {{--<li><a href="contact.html">Help</a></li>--}}

            </ul>
        </div>
        <div class="product_list_header">
            <a href="{{route('cart.index')}}" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng ({{\Gloudemans\Shoppingcart\Facades\Cart::count()}})</a>


        </div>

    </div>
</div>

<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Liên Hệ: (+1800)09668</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="/">THẾ GIỚI SÁCH</a></h1>
        </div>
        <div class="w3l_search">
            <form action="{{route('search')}}" method="get">
                <input type="search" name="search" placeholder="Tìm Kiếm..." value="{{old('search')}}" required="">
                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>

            </form>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{!! url('/') !!}" class="act">Trang Chủ</a></li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Thể Loại<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">


                                    <?php
                                        $menu_level_2=DB::table('categories')->get();
                                        ?>
                                        @foreach($menu_level_2 as $item2)
                                            <li><a href="{!! url('loai_sp',[$item2->id,$item2->name]) !!}">{!!  $item2->name!!}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            </ul>
                        </li>
                </li>

                    <li><a href="contact.html">Tin Tức</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- //navigation -->

<!-- main-slider -->
    @yield('content')
<!-- //main-slider -->
<!-- //top-header and slider -->
<!-- top-brands -->

<!-- //new -->
<!-- //footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>

                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>80B-Vệ An-TP.Bắc Ninh <span></span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:thegoisach@gmail.com">thegoisach@gmail.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>(+84)1809668</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contact Us</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Short Codes</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="groceries.html">Groceries</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="household.html">Household</a></li>
                </ul>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="footer-copy">

        <div class="container">
            <p>Thế Giới Sách. |PXR <a href="http://w3layouts.com/">PXR</a></p>
        </div>
    </div>

</div>


<!-- Bootstrap Core JavaScript -->
<script src="{!! asset("Site/js/bootstrap.min.js") !!}"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<script src="{!! asset("Site/js/minicart.min.js") !!}"></script>
<script>
    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>
<!-- main slider-banner -->
<script src="{!! asset("Site/js/skdslider.min.js") !!}"></script>
<link href="{!! asset("Site/css/skdslider.css") !!}" rel="stylesheet">
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

        jQuery('#responsive').change(function(){
            $('#responsive_wrapper').width(jQuery(this).val());
        });

    });
</script>
<!-- //main slider-banner -->
</body>
</html>