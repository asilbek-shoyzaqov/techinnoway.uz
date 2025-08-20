<!-- Recent Posts Section -->
<section id="recent-posts" class="recent-posts section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $item->menu->{'name_'.app()->getLocale()} }}</h2>
        <p>{{ $item->{'name_'.app()->getLocale()} }}</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-5">

            @foreach($posts as $post)
            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                    @if($post->files->isNotEmpty())
                    <div class="post-img position-relative overflow-hidden">
                        <img src="{{ asset ('storage/'. $post->files->first()->image) }}" class="img-fluid" alt="">
                        <span class="post-date">{{ $post->created_at->format('d') }} {{ $post->created_at->format('M') }}</span>
                    </div>
                    @endif

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">{{ $post->{'title_'.app()->getLocale()} }}</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-megaphone"></i> <span class="ps-2">{{ $post->category->{'name_'.app()->getLocale()} }}</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-eye"></i> <span class="ps-2">{{ $post->{'view'} }}</span>
                            </div>
                        </div>

                        <hr>

                        <a href="{{ route('front.slug', $post->slug) }}" class="readmore stretched-link"><span>{{ $topWord3['name_'.\App::getLocale('lang')] }}</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->
            @endforeach

        </div>

    </div>

</section><!-- /Recent Posts Section -->
