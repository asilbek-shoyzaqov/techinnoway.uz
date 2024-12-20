<!Doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Uyushma</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/front/assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset ('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/assets/css/style.css') }}">
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="/front/assets/img/logo/loder-logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
@include('front.includes.header')
<main>
    @yield('content')
</main>
@include('front.includes.footer')
<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset ('front/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset ('front/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset ('front/assets/js/popper.min.j') }}s"></script>
<script src="{{ asset ('front/assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset ('front/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset ('front/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset ('front/assets/js/slick.min.js') }}"></script>
<!-- Date Picker -->
<script src="{{ asset ('front/assets/js/gijgo.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset ('front/assets/js/wow.min.js') }}"></script>
<script src="{{ asset ('front/assets/js/animated.headline.js') }}"></script>
<script src="{{ asset ('front/assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset ('front/assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset ('front/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset ('front/assets/js/jquery.sticky.js') }}"></script>

<!-- counter , waypoint -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{ asset ('front/assets/js/jquery.counterup.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset ('front/assets/js/contact.js') }}"></script>
<script src="{{ asset ('front/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset ('front/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset ('front/assets/js/mail-script.js') }}"></script>
<script src="{{ asset ('front/assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset ('front/assets/js/plugins.js') }}"></script>
<script src="{{ asset ('front/assets/js/main.js') }}"></script>

</body>
</html>
