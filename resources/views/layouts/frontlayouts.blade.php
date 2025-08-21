<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Techinnoway - @yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="{{ asset('front/assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('front/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('front/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: FlexStart
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Updated: Nov 01 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{--<img src="front/assets/img/logo.png" alt="">--}}
            <h1 class="sitename">TechInnoWay</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                @foreach($menus as $menu)
                    @foreach($menu->submenus as $submenu)
                    <li>
                        <a href="{{ route('front.slug', $submenu->slug) }}">
                            {{ $menu->{'name_'.app()->getLocale()} }}</a>
                    </li>
                    @endforeach
                @endforeach
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <select id="languageSelect" class="btn-getstarted flex-md-shrink-0 form-select w-auto ms-4"
                aria-label="Select Language"
                onchange="changeLanguage(this)">
            <option value="uz" {{ App::getLocale() === 'uz' ? 'selected' : '' }}>Ўзбек</option>
            <option value="ru" {{ App::getLocale() === 'ru' ? 'selected' : '' }}>Русский</option>
            <option value="en" {{ App::getLocale() === 'en' ? 'selected' : '' }}>English</option>
        </select>

        <script>
            function changeLanguage(selectElement) {
                const selectedLanguage = selectElement.value;
                localStorage.setItem('selectedLanguage', selectedLanguage);
                window.location.href = `/lang/${selectedLanguage}`;
            }

            // Sahifa yuklanganda tanlangan tilni o'rnatish
            document.addEventListener('DOMContentLoaded', function () {
                const savedLanguage = localStorage.getItem('selectedLanguage') || 'uz';
                const languageSelect = document.getElementById('languageSelect');
                if (languageSelect) {
                    languageSelect.value = savedLanguage;
                }
            });
        </script>


    </div>
</header>

<main class="main">

    @yield('content')

</main>

<footer id="footer" class="footer">

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">TechInnoWay - {{ date ('Y') }}</strong></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Created by <a href="https://shoyzaqov.uz/">Asilbek Shoyzaqov</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>

</body>

</html>
