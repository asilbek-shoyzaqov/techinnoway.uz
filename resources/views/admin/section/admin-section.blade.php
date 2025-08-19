<?php
$usersCount = \App\Models\User::count ();
$menusCount = \App\Models\Menu::count ();
$submenusCount = \App\Models\Submenu::count ();
$servicesCount = \App\Models\Service::count ();
$managesCount = \App\Models\Manage::count ();
$categoriesCount = \App\Models\Category::count ();
$postsCount = \App\Models\Post::count ();
$wordsCount = \App\Models\Word::count ();
$documentsCount = \App\Models\Document::count ();
?>
<section class="section">
    <div class="row ">
        <!-- Users -->
        @role('admin')
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.users.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Users</h5>
                                        <h2 class="mb-3 font-18">{{ $usersCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="users" class="icon-lg text-violet"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.categories.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Kategoriya</h5>
                                        <h2 class="mb-3 font-18">{{ $categoriesCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="list" class="icon-lg text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.menus.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Menular</h5>
                                        <h2 class="mb-3 font-18">{{ $menusCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="menu" class="icon-lg text-blue"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.submenus.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Submenular</h5>
                                        <h2 class="mb-3 font-18">{{ $submenusCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="chevron-down" class="icon-lg text-red"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.services.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Xizmatlar</h5>
                                        <h2 class="mb-3 font-18">{{ $servicesCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="globe" class="icon-lg text-amber"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.manages.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Rahbariyat</h5>
                                        <h2 class="mb-3 font-18">{{ $managesCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="user-check" class="icon-lg text-fuchsia"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.words.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Wordlar</h5>
                                        <h2 class="mb-3 font-18">{{ $wordsCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="file-text" class="icon-lg text-primary-all"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.documents.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Hujjatlar</h5>
                                        <h2 class="mb-3 font-18">{{ $documentsCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="image" class="icon-lg text-primary-all"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        @endrole

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.posts.index') }}">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Yangiliklar</h5>
                                        <h2 class="mb-3 font-18">{{ $postsCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pl-0 text-right">
                                    <div class="banner-img">
                                        <i data-feather="message-square" class="icon-lg text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</section>

