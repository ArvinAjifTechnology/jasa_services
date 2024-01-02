<div class="leftside-menu">
    <!-- LOGO -->
    <a href="{{ url('/') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img
                src="{{ asset('') }}assets/images/logo.png"
                alt=""
                height="16"
            />
        </span>
        <span class="logo-sm">
            <img
                src="{{ asset('') }}assets/images/logo_sm.png"
                alt=""
                height="16"
            />
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ url('/') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img
                src="{{ asset('') }}assets/images/logo-dark.png"
                alt=""
                height="16"
            />
        </span>
        <span class="logo-sm">
            <img
                src="{{ asset('') }}assets/images/logo_sm_dark.png"
                alt=""
                height="16"
            />
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <ul class="side-nav">
            <li class="side-nav-item">
                {{-- <a href="{{ route('dashboard.index') }}" class="side-nav-link"> --}}
                <a href="{{ route('dashboard.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>{{ __("dashboard") }}</span>
                </a>
            </li>

            @can('admin')
            <li class="side-nav-title side-nav-item">
                {{ __("masterdata") }}
            </li>
            <li class="side-nav-item">
                <a
                    href="{{ route('admin.users') }}"
                    class="side-nav-link"
                >
                    <i class="uil-user"></i>
                    <span>{{ __("manage_users") }}</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.type-of-services') }}" class="side-nav-link">
                    <i class="uil-window"></i>
                    <span>{{ __("type_of_services") }}</span>
                </a>
            </li>
            @endcan
            <li class="side-nav-title side-nav-item">
                {{ __("main_system") }}
            </li>
            @can('user')
            <li class="side-nav-item">
                <a href="{{ route('user.user-motorcycles') }}" class="side-nav-link">
                    <i class="uil-shopping-cart-alt"></i>
                    <span>{{ __("manage_motorcycle") }}</span>
                </a>
            </li>
            @endcan
            @can('admin')
            <li class="side-nav-item">
                <a href="{{ route('transactions.index') }}" class="side-nav-link">
                    <i class="uil-shopping-cart-alt"></i>
                    <span>{{ __("transaction") }}</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="" class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span>{{ __("transaction_report") }}</span>
                </a>
            </li>
            @endcan
            @can('mechanic')
            <li class="side-nav-item">
                <a href="{{ route('transactions.index') }}" class="side-nav-link">
                    <i class="uil-shopping-cart-alt"></i>
                    <span>{{ __("transaction") }}</span>
                </a>
            </li>
            @endcan @can('users')
            <li class="side-nav-item">
                <a href="{{ route('transactions.index') }}" class="side-nav-link">
                    <i class="uil-shopping-cart-alt"></i>
                    <span>{{ __("transaction") }}</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>
