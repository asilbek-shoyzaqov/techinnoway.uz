<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $item->menu->{'name_'.app()->getLocale()} }}</h2>
        <p>{{ $item->{'name_'.app()->getLocale()} }}<br></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            @foreach($item->services as $service)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-{{ $service->{'meta_description'} }} position-relative">
                        <i class="bi {{ $service->{'meta_title'} }} icon"></i>
                        <h3>{{ $service->{'name_'.app()->getLocale()} }}</h3>
                        <p>{{ $service->{'body_'.app()->getLocale()} }}</p>
                    </div>
                </div><!-- End Service Item -->
            @endforeach

        </div>

    </div>

</section><!-- /Services Section -->
