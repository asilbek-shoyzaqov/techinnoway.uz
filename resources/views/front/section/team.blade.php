<!-- Team Start -->
<div class="team-area section-padding30">
    <div class="container">
        <div class="row">
            @foreach($menus as $menu)
                @if($menu->name_uz === 'Haqida')
                    @foreach($menu->submenus as $submenu)
                        @if($submenu->name_uz === 'Uyushma tarkibi')
                            <div class="col-xl-12">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle5 mb-50">
                                    <div class="front-text">
                                        <h2 class="">{{ $submenu->{'name_'.app()->getLocale()} }}</h2>
                                    </div>
                                    <span class="back-text">{{ $menu->{'name_'.app()->getLocale()} }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="row">
            <!-- single Tem -->
            @foreach($manages as $manage)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset ('storage/'. $manage->image) }}" alt="">
                        </div>
                        <div class="team-caption">
                            <span>{{ $manage->{'profession_'.app()->getLocale()} }}</span>
                            <h3>{{ $manage->{'name_'.app()->getLocale()} }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
