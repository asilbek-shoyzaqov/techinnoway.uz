@extends('layouts.frontlayouts')
@section('title', 'Uyushma')
@section('content')
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="/front/assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                                    <div class="hero-cap pt-100">
                                        <h2>{{ $item->{'name_'.app()->getLocale()} }}</h2>
                                        <nav aria-label="breadcrumb ">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">{{ $item->menu->{'name_'.app()->getLocale()} }}</a></li>
                                            </ol>
                                        </nav>
                                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 posts-list">
                    <div class="single-post">
                        <div class="blog_details">
                            <h2>{{ $item->{'name_'.app()->getLocale()} }}</h2>
                            <hr>
                            {!! $item->{'body_'.app()->getLocale()} !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection
