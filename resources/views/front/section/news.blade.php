<!--latest Nnews Area start -->
<div class="latest-news-area section-padding30">
    <div class="container">
        <div class="row">
            @foreach($menus as $menu)
                @if($menu->name_uz === 'Yangiliklar')
                    <div class="col-xl-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle7 mb-50">
                            <div class="front-text">
                                <h2 class="">{{ $menu->{'name_'.app()->getLocale()} }}</h2>
                            </div>
                            <span class="back-text">{{ $menu->{'name_'.app()->getLocale()} }}</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <!-- single-news -->
                    <div class="single-news mb-30">
                        @if($post->files->isNotEmpty())
                        <div class="news-img">
                            <img src="{{ asset ('storage/'. $post->files->first()->image) }}" alt="{{ $post->title_uz }}">
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
                            <h2><a href="{{ route('front.slug', $post->slug) }}">{{ $post->{'title_'.app()->getLocale()} }}</a></h2>
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
