<footer>
    <!-- Footer Start-->
    <div class="footer-main">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row  justify-content-between">
                    <div class="col-lg-4 col-md-4 col-sm-8">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">"Arxitektura-qurilish" uyushmasi: Zamonaviy texnologiyalar va
                                        ilg‘or yechimlardan foydalangan holda doimiy ravishda rivojlanish</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5">

                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Foydali linklar</h4>

                                <ul>
                                    @foreach($submenus->take(4) as $submenu)
                                        <li>
                                            <a href="{{ route('front.slug', $submenu->slug) }}">{{ $submenu->{'name_'.app()->getLocale()} }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Aloqa</h4>
                                <div class="footer-pera">
                                    <p class="info1">Yangishahar ko'chasi 9A-uy,</p>
                                </div>
                                <ul>
                                    <li><a href="#">Email: info@gmail.com</a></li>
                                    <li><a href="#">Tel: +99871</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <!-- Form -->
                            <div class="footer-form">
                                <div id="mc_embed_signup">
                                    <img src="https://taqu.uz/assets/img/ramz/logonew1.svg" width="200px" alt="">
                                </div>
                            </div>
                            <!-- Map -->
                            <div class="map-footer">
                                <img src="assets/img/gallery/map-footer.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Copy-Right -->
                <div class="row align-items-center">
                    <div class="col-xl-12 ">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                |&nbsp;
                                “Arxitektura-qurilish” uyushmasi. By <a
                                    href="#" target="_blank">Asilbek</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
