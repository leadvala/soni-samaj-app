<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Soni Community</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('/profile') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Sliders Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.sliders.index') active @endif">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Sliders</p>
                    </a>
                </li>

                <!-- Register Section Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.register-sections.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.register-sections.index') active @endif">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Register Section</p>
                    </a>
                </li>

                <!-- About Section Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.about-sections.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.about-sections.index') active @endif">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>About Section</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.pages.index') active @endif">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>Pages</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.service-sections.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.service-sections.index') active @endif">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Service Section</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.case-studies.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.case-studies.index') active @endif">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>Case Study</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.testimonials.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.testimonials.index') active @endif">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.blogs.index') active @endif">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.donations.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.donations.index') active @endif">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Donations</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.home-settings.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.home-settings.index') active @endif">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Home Setting</p>
                    </a>
                </li>


                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
