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
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 posts-list">
                    <div class="comment-form">
                        <h4>{{ $item->{'name_'.app()->getLocale()} }}</h4>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        <form class="form-contact comment_form" method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Ism va Familya" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('tel') is-invalid @enderror" name="tel" type="tel" placeholder="Telefon" required>
                                        @error('tel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control @error('company') is-invalid @enderror" name="company" type="text" placeholder="Korxona nomi" required>
                                        @error('company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" cols="30" rows="9" placeholder="Qisqacha izoh" required></textarea>
                                        @error('comment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">
                                    {{ $topWord6['name_'.\App::getLocale('lang')] }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection
