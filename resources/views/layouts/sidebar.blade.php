<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset('public/img/logo.png') }}" alt="MMS" class="brand-image img-circle elevation-3"
             style="opacity: .8">
             <span class="brand-text font-weight-light">MMS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('public/img/defaut.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt blue"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{Helper::menuOpen(Request::path())}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog yellow"></i>
                            <p>
                                Management
                                <i class="right fas fa-angle-left purple"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{URL::to('users')}}" class="nav-link {{Helper::currentPath('users')}}">
                                    <i class="fas fa-users nav-icon"></i>

                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('meal')}}" class="nav-link {{Helper::currentPath('meal')}}">
                                    <i class="fas fa-rocket"></i>
                                    
                                    <p> Meal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('savinglist')}}" class="nav-link {{Helper::currentPath('savinglist')}}">
                                    <i class="fas fa-rocket"></i>
                                    
                                    <p> Saving List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('costlist')}}" class="nav-link {{Helper::currentPath('costlist')}}">
                                    <i class="fas fa-rocket"></i>
                                    
                                    <p> Cost List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <router-link to="/profile" class="nav-link">
                        <i class="nav-icon fas fa-user purple"></i>
                        <p>
                            Profile
                        </p>
                    </router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off red"></i>
                            <p>
                                {{ __('Logout') }}

                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
</aside>
