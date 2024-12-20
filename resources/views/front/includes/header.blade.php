<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li>+99871 </li>
                                    <li>info@gmail.com</li>
                                    <li>Dushanba - Shanba 8:00 - 17:30, Yakshanba - YOPIQ</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <!-- logo-1 -->
                                <a href="/" class="big-logo"><img src="/front/assets/img/logo/loder-logo.png"
                                                                           alt=""></a>
                                <!-- logo-2 -->
                                <a href="/" class="small-logo"><img src="/front/assets/img/logo/loder-logo.png"
                                                                             alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        @foreach($menus as $menu)
                                            <li><a href="{{ count($menu->submenus) ? 'javascript:void(0);' : route('front.slug', $menu->slug) }}">{{ $menu->{'name_'.app()->getLocale()} }}</a>
                                                @if(count ($menu->submenus))
                                                    <ul class="submenu">
                                                        @foreach($menu->submenus as $submenu)
                                                            <li>
                                                                <a href="{{ route('front.slug', $submenu->slug) }}">{{ $submenu->{'name_'.app()->getLocale()} }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach

                                        <li>
                                            <select id="languageSelect" aria-label="Select Language"
                                                    onchange="changeLanguage(this)">
                                                <option value="uz" {{ App::getLocale() === 'uz' ? 'selected' : '' }}>
                                                    O'zbek
                                                </option>
                                                <option value="ru" {{ App::getLocale() === 'ru' ? 'selected' : '' }}>
                                                    Rus
                                                </option>
                                                <option value="en" {{ App::getLocale() === 'en' ? 'selected' : '' }}>
                                                    Ingliz
                                                </option>
                                            </select>
                                            <script>
                                                function changeLanguage(selectElement) {
                                                    const selectedLanguage = selectElement.value;
                                                    localStorage.setItem('selectedLanguage', selectedLanguage);
                                                    window.location.href = `/lang/${selectedLanguage}`;
                                                }

                                                // Sahifa yuklanganda tanlangan tilni o'rnatish
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    const savedLanguage = localStorage.getItem('selectedLanguage') || 'uz'; // Agar hech qanday til saqlanmagan bo'lsa, 'uz'ni tanlaymiz
                                                    const languageSelect = document.getElementById('languageSelect');
                                                    languageSelect.value = savedLanguage; // Tanlov elementini yangilaymiz
                                                });
                                            </script>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="{{ route ('member.login') }}" class="btn">{{ $topWord3['name_'.\App::getLocale('lang')] }}</a>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
