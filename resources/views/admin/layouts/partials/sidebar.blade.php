<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
        {{--        <img src="{{asset('')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <span class="brand-text font-weight-light">Blog task</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel my-2 d-flex">
            <div class="info  w-100 ml-3">
                <a href="#" class="d-block">Zakaria dehaba</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->is('admin/posts*') ? 'menu-open' : ''}}">
                    <a href="{{route('admin.posts.index')}}"
                       class="nav-link {{request()->is('admin/posts*') ? 'active' : ''}}">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>

                <li class="nav-item {{request()->is('admin/categories*') ? 'menu-open' : ''}}">
                    <a href="{{route('admin.categories.index')}}"
                       class="nav-link {{request()->is('admin/categories*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item {{request()->is('admin/users*') ? 'menu-open' : ''}}">
                    <a href="{{route('admin.users.index')}}"
                       class="nav-link {{request()->is('admin/users*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
