<aside class="main-sidebar sidebar-white-primary elevation-4">
    <!-- Brand Logo -->
    <div class="border-bottom">
        <a class="brand-link p-2">
            <p><img src="{{asset('img/logo.png')}}" class="w-100"></p>          
            <!--<h5 class="m-0 text-white"><b>ChickTag</b></h5>-->            
        </a>        
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">        
            <div class="info">
                <div class="small">
                    ログインID：{{session('login_staff.name')}}
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            ダッシュボード                        
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{url('/user')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            学生管理                        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/offer')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            求人管理                        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            ユーザ管理
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>