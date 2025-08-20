<!-- Hero Section -->
<section id="hero" class="hero">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">{{ $topWord1['name_'.\App::getLocale('lang')] }}</h1>
                <p data-aos="fade-up" data-aos-delay="100">{!! $topWord1['text_'.\App::getLocale('lang')] !!}</p>
                <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ $topWord2['url'] }}" class="btn-get-started">{{ $topWord2['name_'.\App::getLocale('lang')] }} <i class="bi bi-arrow-right"></i></a>
                    <a href="https://www.youtube.com/watch?v=hDbXLCPLCHU" class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i class="bi bi-play-circle"></i><span>{!! $topWord2['text_'.\App::getLocale('lang')] !!}</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="/front/assets/img/hero-img2.png" class="img-fluid animated hero-img" alt="">
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->
