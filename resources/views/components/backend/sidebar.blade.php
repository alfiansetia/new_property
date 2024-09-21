<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('frontend.index') }}" class="brand-link">
        <img src="{{ asset('img/logos.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @php
                    $list = ['Data User', 'Data Category', 'Data City', 'Data Property'];
                @endphp
                <li class="nav-item {{ in_array($title, $list) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ in_array($title, $list) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($user->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('backend.users.index') }}"
                                    class="nav-link {{ $title == 'Data User' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.categories.index') }}"
                                    class="nav-link {{ $title == 'Data Category' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.cities.index') }}"
                                    class="nav-link {{ $title == 'Data City' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>City</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('backend.properties.index') }}"
                                class="nav-link {{ $title == 'Data Property' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Property</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if ($user->role == 'admin')
                    @php
                        $list2 = ['Data Article', 'Data Comment'];
                    @endphp
                    <li class="nav-item {{ in_array($title, $list2) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array($title, $list2) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Article
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.articles.index') }}"
                                    class="nav-link {{ $title == 'Data Article' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Article</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.comments.index') }}"
                                    class="nav-link {{ $title == 'Data Comment' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Comment</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('backend.messages.index') }}"
                            class="nav-link {{ $title == 'Data Message' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>Message</p>
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a href="{{ route('backend.profile.index') }}"
                        class="nav-link {{ $title == 'Profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
