<!-- About Section -->
<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $item->menu->{'name_'.app()->getLocale()} }}</h2>
        <p>{{ $item->{'name_'.app()->getLocale()} }}</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up">
        <div class="row gx-0 mb-5">

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h2>{{ optional($item->services->first())->{'name_'.app()->getLocale()} }}</h2>
                    <p>{{ optional($item->services->first())->{'body_'.app()->getLocale()} }}</p>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('storage/' . optional($item->services->first())->image) }}" class="img-fluid" alt="">
            </div>

        </div>

        <div class="row gx-0">

            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('storage/' . optional($item->services->skip(1)->first())->image) }}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h2>{{ optional($item->services->skip(1)->first())->{'name_'.app()->getLocale()} }}</h2>
                    <p>{{ optional($item->services->skip(1)->first())->{'body_'.app()->getLocale()} }}</p>
                </div>
            </div>

        </div>
    </div>

</section><!-- /About Section -->
