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
    <!-- Team Start -->
    <div class="team-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle5 mb-50">
                        <div class="front-text">
                            <h2 class="">{{ $item->{'name_'.app()->getLocale()} }}</h2>
                        </div>
                        <span class="back-text">{{ $item->menu->{'name_'.app()->getLocale()} }}</span>
                    </div>
                </div>
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
@endsection
