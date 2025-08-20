<!-- Team Section -->
<section id="team" class="team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $item->menu->{'name_'.app()->getLocale()} }}</h2>
        <p>{{ $item->{'name_'.app()->getLocale()} }}</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            @foreach($manages as $manage)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ asset ('storage/'. $manage->image) }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-telegram"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ $manage->{'name_'.app()->getLocale()} }}</h4>
                            <span>{{ $manage->{'profession_'.app()->getLocale()} }}</span>
                            <p>{!! $manage->{'body_'.app()->getLocale()} !!}</p>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            @endforeach

        </div>

    </div>

</section><!-- /Team Section -->
