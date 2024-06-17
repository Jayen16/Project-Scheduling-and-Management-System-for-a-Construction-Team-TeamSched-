<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#"class="brand-link">
        <img src="{{ asset('assets/images/teamsched_logo.png') }}" class="brand-image img-circle elevation-3"
            style="opacity: .8">

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

                @if (auth()->user()->hasRole(App\Enums\Employee::ADMIN->value))
                    <li class="nav-item">
                        <a href="{{ route('account-management.index') }}"
                            class="nav-link {{ request()->is('account-management*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Account Management
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole(App\Enums\Employee::MANAGER->value))
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
                @endif

                @if (auth()->user()->hasRole(App\Enums\Employee::MANAGER->value))
                <li class="nav-item">
                    <a href="{{ route('project-management.index') }}"
                        class="nav-link {{ request()->is('project-management*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>

                        <p>
                            Project Management
                        </p>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasRole(App\Enums\Employee::SUPERVISOR->value))
                <li class="nav-item">
                    <a href="{{ route('projects-site-supervisor.index') }}"
                        class="nav-link {{ request()->is('projects-site-supervisor*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>

                        <p>
                            Projects
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects-manpower.index') }}"
                        class="nav-link {{ request()->is('projects-manpower*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>

                        <p>
                            Projects (Manpower)
                        </p>
                    </a>
                </li>






                {{-- <li class="nav-item {{ request()->routeIs('project.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('project.*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase nav-icon"></i>
                        <p>
                            Project Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('project.index') }}"
                                class="nav-link {{ request()->routeIs('project.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Existing Project</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}



            </ul>
        </nav>
    </div>
</aside>
