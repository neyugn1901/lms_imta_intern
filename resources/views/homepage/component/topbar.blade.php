<div class="header-fixed">
    <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
        <div class="container">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ url('/home/index') }}" class="navbar-brand logo">
                    <img src="{{ asset('assets_home/img/logo.svg') }}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ url('/home/index') }}" class="menu-logo">
                        <img src="{{ asset('assets_home/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <!-- Example menu items -->
                    <li class="has-submenu">
                        <a href="#">Instructor <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="#">Instructor</a>
                                <ul class="submenu">
                                    <li><a href="#">List</a></li>
                                    <li><a href="#">Grid</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">My Course</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Student <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu first-submenu">
                            <li class="has-submenu">
                                <a href="#">Student</a>
                                <ul class="submenu">
                                    <li><a href="#">List</a></li>
                                    <li><a href="#">Grid</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Student Dashboard</a></li>
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">Enrolled Courses</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Pages <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Category</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Checkout</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Blog <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="#">Blog List</a></li>
                            <li><a href="#">Blog Grid</a></li>
                            <li><a href="#">Blog Masonry</a></li>
                            <li><a href="#">Blog Modern</a></li>
                            <li><a href="#">Blog Details</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                @guest
                    <li class="nav-item">
                        <a class="nav-link header-sign" href="{{ route('auth.login') }}">Signin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-login" href="{{ route('auth.register') }}">Signup</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link header-login" href="{{ route('auth.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>
