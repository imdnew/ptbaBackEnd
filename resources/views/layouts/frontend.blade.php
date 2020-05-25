<!DOCTYPE html>
<html lang="fr">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163969473-1"></script>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>CORUS BURKINA FASO</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/img/favicon.ico') }}">

    <!-- Leaflet library -->
    <link rel="stylesheet" href="{{ asset('/frontend/leaflet/leaflet.css') }}">
    <script>
        window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-163969473-1');
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!-- Start of Async Callbell Code -->
<script>
    window.callbellSettings = {
      token: "xwBFP66r5jS2voZoxu6GQjJY"
    };
  </script>
  <script>
    (function(){var w=window;var ic=w.callbell;if(typeof ic==="function"){ic('reattach_activator');ic('update',callbellSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Callbell=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://dash.callbell.eu/include/'+window.callbellSettings.token+'.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()
  </script>
  <!-- End of Async Callbell Code -->

  <style type="text/css">
      #table-stats tr > th, td {
        font-size: 12px !important;
        padding-bottom: 1rem;
     }
  </style>
  
</head>
  <body onload="getData();">

  <!-- BEGIN main menu -->
        @include('partials.front_nav')
    <!-- END main menu  -->

    <!-- BEGIN Page Content -->
        @yield('content')
    <!-- END Page Content -->

    <!-- BEGIN footer -->
        @include('partials.front_footer')
    <!-- END footer  -->

    <script src="{{ asset('frontend/js/jquery-3.2.0.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/countdown.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/wow.js') }}"></script>
<script src="{{ asset('frontend/js/parallax.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/theme.js') }}"></script>

<!-- LEAFTLET -->
<script type="text/javascript" src="{{ asset('/frontend/leaflet/leaflet.js') }} "></script>

<script src={{ asset("frontend/js/highcharts.js") }}></script>
<script src={{ asset("frontend/js/modules/series-label.js") }}></script>
<script src={{ asset("frontend/js/modules/exporting.js") }}></script>
<script src={{ asset("frontend/js/modules/export-data.js") }}></script>
<!--    <script src="http://covid19.gov.bf:6001/socket.io/socket.io.js"></script>-->
<!--  <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
-->    <script type="text/javascript" src="{{ asset('js/socket.io.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/csj.js') }}"></script>

    <script type="text/javascript">
        var i=_a;
        function getData(){
            i.init();
        }
   
            </script>
</body>

</html>