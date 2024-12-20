<!-- About Area Start -->
<section class="support-company-area fix pt-10">
    @foreach($menus as $menu)
        @if($menu->name_uz === 'Haqida')
            @foreach($menu->submenus as $submenu)
                @if($submenu->name_uz === 'Biz haqimizda')
                    <div class="support-wrapper align-items-end">
                        <div class="left-content">
                            <!-- section tittle -->
                            <div class="section-tittle section-tittle2 mb-25">
                                <div class="front-text">
                                    <h2 class="">{{ $submenu->{'name_'.app()->getLocale()} }}</h2>
                                </div>
                                <span class="back-text">{{ $menu->{'name_'.app()->getLocale()} }}</span>
                            </div>
                            <div class="support-caption">
                                <p>{!! \Illuminate\Support\Str::limit($submenu->{'body_'.app()->getLocale()}, 205) !!}</p>
                                <a href="{{ route ('front.slug', $submenu->slug) }}" class="btn red-btn2">{{ $topWord5['name_'.\App::getLocale('lang')] }}</a>
                            </div>
                        </div>
                        <div class="right-content">
                            <!-- img -->
                            <div class="right-img">
                                <img src="/front/assets/img/gallery/construction_manager.jpg" alt="">
                            </div>
                            <div class="support-img-cap text-center">
                                <span>2024</span>
                                <p>Dan boshlab</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</section>
<!-- About Area End -->
