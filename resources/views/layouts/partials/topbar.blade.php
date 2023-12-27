<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('assets/images/flags/'.app()->getLocale().'.png') }}" alt="user-image" class="me-0
                me-sm-1" height="12">
                <span class="align-middle d-none d-sm-inline-block"></span> <i
                    class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">

                <!-- item-->
                <a href="{{ url('locale/en') }}" class="dropdown-item notify-item">
                    <img src="{{ asset('') }}assets/images/flags/en.png" alt="user-image" class="me-1" height="12">
                    <span class="align-middle">English</span>
                </a>

                <!-- item-->
                <a href="{{ url('locale/id') }}" class="dropdown-item notify-item">
                    <img src="{{ asset('') }}assets/images/flags/id.png" alt="user-image" class="me-1" height="12">
                    <span class="align-middle">Indonesia</span>
                </a>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    {{-- <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle"> --}}
                </span>
                <span>
                    <span class="account-user-name">{{ auth()->user()->full_name }}</span>
                    <span class="account-position">{{ Str::ucfirst(auth()->user()->role) }}</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">{{ __('menu.Welcome') }}</h6>
                </div>

                <!-- item-->
                <a href="{{ url('/profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>{{ __('menu.MyAccount') }}</span>
                </a>

                <!-- item-->
                <a href="{{ url('contact') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-smart-card me-1"></i>
                    <span>{{ __('menu.Contact') }}</span>
                </a>

                <!-- item-->
                <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout me-1"></i>
                    {{ __("menu.Logout") }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
<!-- end Topbar -->
