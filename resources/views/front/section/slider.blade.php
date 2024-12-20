<!-- slider Area Start-->
<div class="slider-area ">
    <div class="slider-active">
        <div class="single-slider  hero-overly slider-height d-flex align-items-center"
             style="background-image: url('/front/assets/img/hero/h1_hero.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="hero__caption">
                            <div class="hero-text1">
                                    <span data-animation="fadeInUp"
                                          data-delay=".3s">{{ $topWord4['name_'.\App::getLocale('lang')] }}</span>
                            </div>
                            <h1 data-animation="fadeInUp"
                                data-delay=".5s">{{ $topWord1['name_'.\App::getLocale('lang')] }}</h1>
                            <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                <h2>{{ $topWord2['name_'.\App::getLocale('lang')] }}</h2>
                                <h2>{{ $topWord2['name_'.\App::getLocale('lang')] }}</h2>
                            </div>
                            <div class="hero-text2 mt-130" data-animation="fadeInUp" data-delay=".9s">
                                @foreach($submenus as $submenu)
                                    @if($submenu->name_uz === 'Uyushma a\'zosiga aylaning')
                                        <div class="f-left">
                                            <a href="{{ route('front.slug', $submenu->slug) }}" class="btn">{{ $submenu->{'name_'.app()->getLocale()} }}&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    @endif
                                @endforeach
                                {{--                                <span><a href="#">Zamonaviy arxitektura</a></span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
