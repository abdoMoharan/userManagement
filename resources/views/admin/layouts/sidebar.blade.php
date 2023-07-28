<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">User Management </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::user()->image ?? 'admin/default/avatar-370-456322-1662765804.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.profile.index')}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('sidebar')
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}"
                        class="nav-link {{ Route::is('admin.users.index') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                           User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.roles.index')}}"
                        class="nav-link {{ Route::is('admin.roles.index') ? 'active' : '' }}">
                        <i class="fas fa-hand-sparkles"></i>
                        <p>
                           Roles
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.permissions.index')}}"
                        class="nav-link {{ Route::is('admin.permissions.index') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram"></i>
                        <p>
                            Permissions
                        </p>
                    </a>
                </li>
                @endcan
                {{-- Logot ------------------------------- --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link btn btn-secondary  text-light btn-sm">
                        <span class="fas fa-sign-out-alt"></span>
                        Logout
                    </button>
                </form>
                {{-- End Logot ------------------------------- --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
