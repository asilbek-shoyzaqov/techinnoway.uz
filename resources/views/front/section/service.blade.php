<!-- Services Area Start -->
<div class="services-area1 section-padding30">
    @foreach($menus as $menu)
        @if($menu->name_uz === 'Xizmatlar')
            @foreach($menu->submenus as $submenu)
                @if($submenu->name_uz === 'Bizning xizmatlar')
                    <div class="container">
                        <!-- section tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-55">
                                    <div class="front-text">
                                        <h2 class="">{{ $submenu->{'name_'.app()->getLocale()} }}</h2>
                                    </div>
                                    <span class="back-text">{{ $menu->{'name_'.app()->getLocale()} }}</span>
                                </div>
                            </div>
                        </div>
                        @php
                            $limitedServices = $submenu->services->take(3);
                        @endphp
                        <div class="row">
                            @foreach($limitedServices as $service)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-service-cap mb-30">
                                    <div class="service-img">
                                        <img src="{{ asset ('storage/'. $service->image) }}" alt="">
                                    </div>
                                    <div class="service-cap">
                                        <h4><a href="services_details.html">{{ $service->{'name_'.app()->getLocale()} }}</a></h4>
                                        <a href="services_details.html" class="more-btn">{{ $topWord5['name_'.\App::getLocale('lang')] }} <i
                                                class="ti-plus"></i></a>
                                    </div>
                                    <div class="service-icon">
                                        <img src="/front/assets/img/icon/services_icon1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</div>
<!-- Services Area End -->
