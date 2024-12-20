<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Admin{{--<img alt="image" src="https://taqu.edu.uz/assets/img/ramz/logonew1.svg" class="header-logo" />--}}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">User {{ auth()->user()->name }}</li>
            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Admin Panel</span></a>
            </li>
            @role('admin')
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.users.index') }}">Manage User</a></li>
                    <li><a class="nav-link" href="{{ route('admin.roles.index') }}">Manage Role</a></li>
                    <li><a class="nav-link" href="{{ route('admin.permissions.index') }}">Manage Permission</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="list"></i><span>Kategoriya</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.categories.create') }}">Kategoriya qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.categories.index') }}">Barcha kategoriyalar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="menu"></i><span>Menular</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.menus.create') }}">Menu qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.menus.index') }}">Barcha menular</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="chevron-down"></i><span>Submenular</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.submenus.create') }}">Submenu qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.submenus.index') }}">Barcha submenular</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="globe"></i><span>Xizmatlar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.services.create') }}">Xizmatlar qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.services.index') }}">Barcha xizmatlar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="user-check"></i><span>Rahbariyat</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.manages.create') }}">Rahbariyat qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.manages.index') }}">Barcha rahbarlar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Wordlar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.words.create') }}">Word qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.words.index') }}">Barcha Wordlar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Hujjatlar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.documents.create') }}">Hujjat qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.documents.index') }}">Barcha Hujjatlar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Uyushma a'zolari</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.members.create') }}">A'zolar qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.members.index') }}">Barcha a'zolar</a></li>
                </ul>
            </li>
            @endrole
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="message-square"></i><span>Yangiliklar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route ('admin.posts.create') }}">Yangilik qo'shmoq</a></li>
                    <li><a class="nav-link" href="{{ route ('admin.posts.index') }}">Barcha yangiliklar</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
