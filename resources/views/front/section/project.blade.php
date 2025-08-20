<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $item->menu->{'name_'.app()->getLocale()} }}</h2>
        <p>{{ $item->{'name_'.app()->getLocale()} }}</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($item->services as $service)
                    <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset ('storage/'. $service->image) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $service->{'name_'.app()->getLocale()} }}</h4>
                                <p>{{ $service->{'body_'.app()->getLocale()} }}</p>
                                <a href="{{ asset ('storage/'. $service->image) }}" title="{{ $service->{'name_'.app()->getLocale()} }}"
                                   data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                @endforeach
            </div><!-- End Portfolio Container -->

        </div>

    </div>

</section><!-- /Portfolio Section -->
