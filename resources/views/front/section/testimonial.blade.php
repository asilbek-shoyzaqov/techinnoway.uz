<!-- Testimonial Start -->
<div class="testimonial-area t-bg testimonial-padding">
    @foreach($menus as $menu)
        @if($menu->name_uz === 'Hamkorlar')
            @foreach($menu->submenus as $submenu)
                @if($submenu->name_uz === 'Fikr-mulohaza')
                    <div class="container ">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle6 mb-50">
                                    <div class="front-text">
                                        <h2 class="">{{ $submenu->{'name_'.app()->getLocale()} }}</h2>
                                    </div>
                                    <span class="back-text">{{ $menu->{'name_'.app()->getLocale()} }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-10 col-lg-11 col-md-10 offset-xl-1">
                                <div class="h1-testimonial-active">
                                    <!-- Single Testimonial -->
                                    <div class="single-testimonial">
                                        <!-- Testimonial Content -->
                                        <div class="testimonial-caption ">
                                            <div class="testimonial-top-cap">
                                                <!-- SVG icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     width="86px" height="63px">
                                                    <path fill-rule="evenodd" stroke-width="1px"
                                                          stroke="rgb(255, 95, 19)"
                                                          fill-opacity="0" fill="rgb(0, 0, 0)"
                                                          d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                                </svg>
                                                <p>"Arxitektura-qurilish" uyushmasi bilan ishlash davomida ularning
                                                    professional yondashuvini his qildik. Loyihalar har doim belgilangan
                                                    muddatda va sifatli bajarildi. Bizning talablarimizni chuqur
                                                    o‘rganib, mos ravishda yechimlar taklif qilishgani bizni juda
                                                    qoniqtirdi.</p>
                                            </div>
                                            <!-- founder -->
                                            <div class="testimonial-founder d-flex align-items-center">
                                                <div class="founder-text">
                                                    <span>Anvar Sultonov</span>
                                                    <p>— Inshoot quruvchilari kompaniyasi vakili</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Testimonial -->
                                    <div class="single-testimonial">
                                        <!-- Testimonial Content -->
                                        <div class="testimonial-caption ">
                                            <div class="testimonial-top-cap">
                                                <!-- SVG icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     width="86px" height="63px">
                                                    <path fill-rule="evenodd" stroke-width="1px"
                                                          stroke="rgb(255, 95, 19)"
                                                          fill-opacity="0" fill="rgb(0, 0, 0)"
                                                          d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                                </svg>
                                                <p>Uyushma nafaqat loyihalarni amalga oshiradi, balki o‘z sohasidagi
                                                    mutaxassislarni tayyorlash va malakasini oshirishga katta ahamiyat
                                                    beradi. Bizning xodimlarimiz ular tashkil etgan treninglarda
                                                    qatnashib, foydali ko‘nikmalarni egallashdi.</p>
                                            </div>
                                            <!-- founder -->
                                            <div class="testimonial-founder d-flex align-items-center">
                                                <div class="founder-text">
                                                    <span>Temur Mahmudov</span>
                                                    <p>— Kadrlar tayyorlash markazi vakili</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</div>
<!-- Testimonial End -->
