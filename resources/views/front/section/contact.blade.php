<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $item->menu->{'name_'.app()->getLocale()} }}</h2>
        <p>{{ $item->{'name_'.app()->getLocale()} }}</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>{{ $topWord4['name_'.\App::getLocale('lang')] }}</h3>
                            <p>{!! $topWord4['text_'.\App::getLocale('lang')] !!}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>{{ $topWord5['name_'.\App::getLocale('lang')] }}</h3>
                            <p>{!! $topWord5['text_'.\App::getLocale('lang')] !!}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>{{ $topWord6['name_'.\App::getLocale('lang')] }}</h3>
                            <p>{!! $topWord6['text_'.\App::getLocale('lang')] !!}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item" data-aos="fade" data-aos-delay="500">
                            <i class="bi bi-clock"></i>
                            <h3>{{ $topWord7['name_'.\App::getLocale('lang')] }}</h3>
                            <p>{!! $topWord7['text_'.\App::getLocale('lang')] !!}</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14864.103406391598!2d69.304787!3d41.3598146!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef3e6ddff9841%3A0xb895faaef342b335!2sTashkent%20University%20of%20Architecture%20and%20Civil%20Engineering!5e1!3m2!1sen!2s!4v1741678186590!5m2!1sen!2s"
                            width="600" height="370" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact Section -->
