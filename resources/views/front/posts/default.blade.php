@extends('layouts.frontlayouts')
@section('title', 'Submenus')
@section('content')
    <!-- Main Content -->
    <div class="main-content">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-10">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">

                                <h2 class="title">{{ $item->{'title_'.app()->getLocale()} }}</h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-megaphone"></i> <a href="#">{{ $item->category->{'name_'.app()->getLocale()} }}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ $item->created_at->format('d-m-Y') }}</time></a></li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content">
                                    @if($item->files->isNotEmpty())
                                    <img src="{{ asset('storage/' . optional($item->files->first())->image) }}" class="img-fluid" alt="">
                                    @endif
                                    <p>{!! $item->{'text_'.app()->getLocale()} !!}</p>

                                </div><!-- End post content -->

                                <div class="meta-bottom">
                                    <ul class="cats">
                                        <li><a href="#">{{ $item->{'meta_title'} }}</a></li>
                                    </ul>
                                </div><!-- End meta bottom -->

                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->
                </div>

            </div>
        </div>

    </div>
@endsection
