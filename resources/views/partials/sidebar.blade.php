<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}

        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" width="30"
            style="">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            {{-- Dropdown --}}
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @can('dashboard-access')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-header">Data</li>
                @can('master-data-access')
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->is('users*') || request()->is('roles*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('users-access')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pengguna</p>
                                    </a>
                                </li>
                            @endcan
                            @can('role-access')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                        class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Role</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('regulation-access')
                    <li class="nav-header">Peraturan</li>

                    <li class="nav-item">
                        <a href="{{ route('peraturan.index') }}"
                            class="nav-link {{ request()->routeIs('peraturan.index') && !in_array(request('type'), ['pending','penetapan', 'pengusulan']) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>Seluruh Peraturan</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('peraturan.index', ['type' => 'penetapan']) }}"
                            class="nav-link {{ request('type') === 'penetapan' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>Penetapan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('peraturan.index', ['type' => 'pengusulan']) }}"
                            class="nav-link {{ request('type') === 'pengusulan' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>Perencanaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('peraturan.index', ['type' => 'pending']) }}"
                            class="nav-link {{ request('type') === 'pending' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>Pending</p>
                        </a>
                    </li>
                @endcan
                </li>
                @can('log-access')
                    <li class="nav-header">System</li>

                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ request()->is('log*') || request()->is('log*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                Log
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('log-activity') }}"
                                    class="nav-link {{ request()->routeIs('log-activity') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Aktivitas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('log') }}"
                                    class="nav-link {{ request()->routeIs('log') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sistem</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <li class="mt-3 nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" id="form-logout-button" class="nav-link">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p>
                                Logout
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
