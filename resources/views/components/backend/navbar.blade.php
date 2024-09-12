<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('frontend.index') }}" class="nav-link">Home</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ $user->avatar }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ $user->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ $user->avatar }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ $user->name }} - {{ $user->role }}
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <form action="{{ route('logout') }}" method="POST">
                        <a href="{{ route('backend.profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                        @csrf
                        <button type="submit" class="btn btn-default btn-flat float-right"
                            onclick="return confirm('Sign Out?')">Sign out</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
