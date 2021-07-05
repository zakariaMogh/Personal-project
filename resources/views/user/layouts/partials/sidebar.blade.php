<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
        <span class="brand-text font-weight-light">Blog task</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel my-2 d-flex">
            <div class="info  w-100 ml-3">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('user.home')}}" class="nav-link {{request()->is('user') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->is('user/posts*') ? 'menu-open' : ''}}">
                    <a href="{{route('user.posts.index')}}"
                       class="nav-link {{request()->is('user/posts*') ? 'active' : ''}}">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>
                @if(auth()->user()->is_admin)
                    <li class="nav-item {{request()->is('user/categories*') ? 'menu-open' : ''}}">
                        <a href="{{route('user.categories.index')}}"
                           class="nav-link {{request()->is('user/categories*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>

                    <li class="nav-item {{request()->is('user/users*') ? 'menu-open' : ''}}">
                        <a href="{{route('user.users.index')}}"
                           class="nav-link {{request()->is('user/users*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
