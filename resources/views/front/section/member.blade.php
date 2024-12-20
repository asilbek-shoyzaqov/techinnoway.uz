<!-- contact with us Start -->
<section class="contact-with-area" data-background="/front/assets/img/gallery/section-bg2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
                <div class="contact-us-caption">
                    @foreach($menus as $menu)
                        @if($menu->name_uz === 'Hamkorlar')
                            @foreach($menu->submenus as $submenu)
                                @if($submenu->name_uz === 'Uyushma a\'zosiga aylaning')
                                    <div class="team-info mb-30 pt-45">
                                        <!-- Section Tittle -->
                                        <div class="section-tittle section-tittle4">
                                            <div class="front-text">
                                                <h2 class="">{{ $submenu->{'name_'.app()->getLocale()} }}</h2>
                                            </div>
                                            <span class="back-text">{{ $menu->{'name_'.app()->getLocale()} }}</span>
                                        </div>
                                        <p>{!! $submenu->{'body_'.app()->getLocale()} !!}</p>
                                        <a href="{{ route('front.slug', $submenu->slug) }}" class="white-btn">{{ $topWord5['name_'.\App::getLocale('lang')] }}</a>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact with us End-->
