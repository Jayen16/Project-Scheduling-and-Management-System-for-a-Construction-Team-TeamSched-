<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#"class="brand-link">
        <img src="{{ asset('assets/images/RonaldCodesLogo.png') }}" alt="RonaldCodes Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">

        {{-- <a href="https://www.youtube.com/@RonaldCodes23" target="_blank"><img
                src="{{ asset('assets/images/RonaldCodesLogo.png') }}" alt="Ronald Codes Logo"
                class="brand-image img-circle elevation-3 rounded-circle cursor-pointer" style="width: 50px" />
        </a> --}}

        <span class="brand-text font-weight-lighter">TEAMSCHED</span>
    </a>

    <div class="sidebar">
        {{-- Sidebar user panel (optional)  --}}
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/bms_logo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('account-management.index') }}"
                        class="nav-link {{ request()->is('account-management*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Account Management
                        </p>
                    </a>
                </li>

                {{-- manpower --}}
                <li class="nav-item">
                    <a href="{{ route('manpower.index') }}"
                        class="nav-link {{ request()->is('manpower*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hammer"></i>
                        <p>
                            Manpower
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('project.index') }}"
                        class="nav-link {{ request()->is('project*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>

                        <p>
                            Project
                        </p>
                    </a>
                </li>

                <li class="nav-header">EXAMPLES</li>

                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>

                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>

                        <p>
                            Gallery
                        </p>
                    </a>
                </li>

                <li class="nav-header">MULTI LEVEL EXAMPLE</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-briefcase nav-icon"></i>

                        <p>
                            Project
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Existing Project</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
