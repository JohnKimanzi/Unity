<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('img/unity_logo_transparent.png')}}" width="200" height="50" alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <strong>
            <h3>{{ config('app.name') }}</h3>
        </strong>
    </div>

    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="{{route('global-search')}}" method="POST">
                    @csrf
                    <input class="form-control" type="text" placeholder="Search here" name="search_term">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>
        <!-- /Search -->



        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="{{asset('img/user.jpg')}}" alt="">
                    <span class="status online"></span></span>
                <span>@if(Auth::user()!=null) {{Auth::user()->name}} @else Not Logged in @endif</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('users.show', Auth::user())}}"><i class="fa fa-user"></i>My
                    Profile</a>
                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#time-record-modal"><i class="la la-sign-in"></i> Clock Out</a>
      
                {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="fa fa-door-open"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> --}}
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{route('users.show', Auth::user())}}">My Profile</a>
            <a class="dropdown-item" href="login">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
    
    
    
</div>