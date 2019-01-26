<nav class="navbar header-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a href="index.html">
                <img class="img-fluid" src="{{asset('images/backend_images/logo.png')}}" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <div>
                <ul class="nav-left">
                    <li>
                        <a id="collapse-menu" href="#">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()">
                            <i class="ti-fullscreen"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="header-notification lng-dropdown">
                        <a href="#" id="dropdown-active-item">
                            <i class="flag-icon flag-icon-gb m-r-5"></i> English
                        </a>
                        <ul class="show-notification">
                            <li>
                                <a href="#" data-lng="en">
                                    <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="es">
                                    <i class="flag-icon flag-icon-es m-r-5"></i> Spanish
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="pt">
                                    <i class="flag-icon flag-icon-pt m-r-5"></i> Portuguese
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="fr">
                                    <i class="flag-icon flag-icon-fr m-r-5"></i> French
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="user-profile header-notification">
                        <a href="#!">
                            @if(Auth::user()->image)
                                <img class="img-fluid" src="{{asset('/images/backend_images/users/small/'.Auth::user()->image)}}" alt="Theme-Logo" />
                            @endif
                            <span>{{ Auth::user()->name }}</span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            <li>
                                <a href="{{url('/admin/settings')}}">
                                    <i class="ti-settings"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/usp')}}">
                                    <i class="ti-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/logout')}}">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>