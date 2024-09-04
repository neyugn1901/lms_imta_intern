<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset('assets_admin/img/profile_small.jpg') }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                     </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">QUẢN LÝ NGƯỜI DÙNG</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="{{ route('admin.users.index') }}">Người dùng</a></li>
                    <li class="active"><a href="{{ route('admin.user_category.index') }}">Danh mục</a></li>
                    
                </ul>
            </li>
            <li class="active">
                <a href="index.html"><i class="fa fa-book"></i> <span class="nav-label">QUẢN LÝ KHÓA HỌC</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li class="active"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>
                    <li class="active"><a href="{{ route('admin.courses.index') }}">Khóa học</a></li>
                </ul>
            </li>
            
            
        </ul>
    </div>
</nav>