<!-- Project Area Start -->
<section class="project-area  section-padding30">
    @foreach($menus as $menu)
        @if($menu->name_uz === 'Loyihalar')
            @foreach($menu->submenus as $submenu)
                @if($submenu->name_uz === 'Bizning loyihalar')
                    <div class="container">
                        <div class="project-heading mb-35">
                            <div class="row align-items-end">
                                <div class="col-lg-6">
                                    <!-- Section Tittle -->
                                    <div class="section-tittle section-tittle3">
                                        <div class="front-text">
                                            <h2 class="">{{ $submenu->{'name_'.app()->getLocale()} }}</h2>
                                        </div>
                                        <span class="back-text">{{ $menu->{'name_'.app()->getLocale()} }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content active" id="nav-tabContent">
                                    <!-- card ONE -->
                                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="project-caption">
                                            @php
                                                $limitedServices = $submenu->services->take(3);
                                            @endphp
                                            <div class="row">
                                                @foreach($limitedServices as $service)
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="single-project mb-30">
                                                            <div class="project-img">
                                                                <img src="{{ asset ('storage/'. $service->image) }}"
                                                                     alt="">
                                                            </div>
                                                            <div class="project-cap">
                                                                <a href="#" class="plus-btn"><i
                                                                        class="ti-plus"></i></a>
                                                                <h4>
                                                                    <a href="#">{{ $service->{'name_'.app()->getLocale()} }}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</section>
<!-- Project Area End -->
