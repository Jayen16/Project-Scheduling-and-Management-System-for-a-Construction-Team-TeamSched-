<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard.index') }}" wire:navigate class="nav-link">Home</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
    
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                {{-- <span href="#" class="dropdown-item" disabled>
                    <i class="fas fa-user mr-2"></i> Juan dela Cruz
                </span> --}}

                <a wire:click="logoutUser" class="dropdown-item" style="cursor: pointer;">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
