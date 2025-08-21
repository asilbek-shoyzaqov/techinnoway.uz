<!-- About Section -->
<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-10">
            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        <h2 class="title">{{ $item->{'name_'.app()->getLocale()} }}</h2>

                        <div class="content">
                            <p>{!! $item->{'body_'.app()->getLocale()} !!}</p>
                        </div><!-- End post content -->

                    </article>

                </div>
            </section><!-- /Blog Details Section -->
        </div>

    </div>
</div>


