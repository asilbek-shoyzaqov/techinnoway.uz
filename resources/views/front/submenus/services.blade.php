@extends('layouts.frontlayouts')
@section('title', 'Uyushma')
@section('content')
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
             data-background="/front/assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>{{ $item->{'name_'.app()->getLocale()} }}</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="#">{{ $item->menu->{'name_'.app()->getLocale()} }}</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area Start -->
    <div class="services-area1 section-padding30">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-55">
                        <div class="front-text">
                            <h2 class="">{{ $item->{'name_'.app()->getLocale()} }}</h2>
                        </div>
                        <span class="back-text">{{ $item->menu->{'name_'.app()->getLocale()} }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($item->services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service-cap mb-30">
                            <div class="service-img">
                                <img src="{{ asset ('storage/'. $service->image) }}" alt="">
                            </div>
                            <div class="service-cap">
                                <h4><a href="services_details.html">{{ $service->{'name_'.app()->getLocale()} }}</a>
                                </h4>
                                <a href="services_details.html"
                                   class="more-btn">{{ $topWord5['name_'.\App::getLocale('lang')] }} <i
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
    </div>
    <!-- Services Area End -->
@endsection
