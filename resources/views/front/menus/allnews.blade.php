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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--latest Nnews Area start -->
    <div class="latest-news-area section-padding30">
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle7 mb-50">
                        <div class="front-text">
                            <h2 class="">{{ $item->{'name_'.app()->getLocale()} }}</h2>
                        </div>
                        <span class="back-text">{{ $item->{'name_'.app()->getLocale()} }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <!-- single-news -->
                        <div class="single-news mb-30">
                            @if($post->files->isNotEmpty())
                                <div class="news-img">
                                    <img src="{{ asset ('storage/'. $post->files->first()->image) }}"
                                         alt="{{ $post->title_uz }}">
                                    <div class="news-date text-center">
                                        <span>{{ $post->created_at->format('d') }}</span>
                                        <p>{{ $post->created_at->format('M') }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp; {{ $post->category->{'name_'.app()->getLocale()} }}</li>
                                </ul>
                                <h2>
                                    <a href="{{ route('front.slug', $post->slug) }}">{{ $post->{'title_'.app()->getLocale()} }}</a>
                                </h2>
                                <a href="{{ route('front.slug', $post->slug) }}"
                                   class="d-btn">{{ $topWord5['name_'.\App::getLocale('lang')] }} »</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--latest News Area End -->
@endsection
