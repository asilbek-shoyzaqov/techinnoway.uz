<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - @yield('title')</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/section.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='#' />
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle">
                        <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
                            <i data-feather="bell" class="bell"></i>
                            @if($unreadComments->count() > 0)
                                <span class="badge badge-danger">{{ $unreadComments->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Yangi Murojatlar
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                @forelse($unreadComments as $comment)
                                    <a href="{{ route('admin.comments.show', $comment->id) }}" class="dropdown-item dropdown-item-unread">
                    <span class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-user"></i>
                    </span>
                                        <span class="dropdown-item-desc">
                        <b>{{ $comment->name }}</b> - {{ \Illuminate\Support\Str::limit($comment->comment, 50) }}
                        <span class="time">{{ $comment->created_at->diffForHumans() }}</span>
                    </span>
                                    </a>
                                @empty
                                    <div class="text-center p-3">Yangi murojaatlar yo'q</div>
                                @endforelse
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="{{ route('admin.comments.index') }}">Barchasi <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="/admin/assets/img/users/user-3.png" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Salom {{ auth()->user()->name }}</div>
                            <a href="{{ route('admin.users.index')}}" class="dropdown-item has-icon"> <i class="far
										fa-user"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item has-icon text-danger" style="line-height: 0.8;"><i
                                        class="fas fa-sign-out-alt"></i>Chiqish</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            @yield('content')

            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Respect0872</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/datatables.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>



    <script>
        let url = window.location.href
        let a = document.querySelectorAll("[href='"+url+"']")[0]
        a.parentElement.classList.add('active')
    </script>

    @yield('js')

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
