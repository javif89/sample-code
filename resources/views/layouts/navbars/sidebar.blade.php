<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->

        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse d-lg-flex flex-column justify-content-between" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item mb-5">
                    <a class="navbar-brand pt-0" href="{{ route('home') }}">
                        <img src="{{ asset('img/logo-dark.svg') }}" class="navbar-brand-img" alt="...">
                    </a>
                </li>
                @cannot('distributor')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-products') ? 'active' : '' }}" href="{{ route('view-products') }}">
                        <i class="ni ni-shop text-blue"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-branding-assets') ? 'active' : '' }}" href="{{ route('view-branding-assets') }}">
                        <i class="ni ni-tag text-orange"></i> Branding Assets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-promotions') ? 'active' : '' }}" href="{{ route('view-promotions') }}">
                        <i class="ni ni-tag text-orange"></i> Promotions
                    </a>
                </li>
                    @can('edit-articles')
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('view-press-articles') ? 'active' : '' }}" href="{{ route('view-press-articles') }}">
                            <i class="fa fa-newspaper text-orange"></i> Press
                        </a>
                    </li>
                    @endcannot
                @endcannot
                @can('distributor')
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('view-distributor-files') ? 'active' : '' }}" href="{{ route('view-distributor-files') }}">
                            <i class="ni ni-tag text-orange"></i> Distributor Assets
                        </a>
                    </li>
                @endcan
                @can('manage-events')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-tradeshows') ? 'active' : '' }}" href="{{ route('view-tradeshows') }}">
                        <i class="ni ni-notification-70 text-info"></i> Trade Shows
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-events') ? 'active' : '' }}" href="{{ route('view-events') }}">
                        <i class="ni ni-notification-70 text-info"></i> Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-demos') ? 'active' : '' }}" href="{{ route('view-demos') }}">
                        <i class="fas fa-desktop text-purple"></i> Virtual Demos
                    </a>
                </li>
                @endcan
                @can('manage-customers')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-customers') ? 'active' : '' }}" href="{{ route('view-customers') }}">
                        <i class="fa fa-user-friends text-success"></i> Customers
                    </a>
                </li>
                @endcan
                @can('manage-careers')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('view-careers') ? 'active' : '' }}" href="{{ route('view-careers') }}">
                        <i class="fa fa-graduation-cap"></i> Careers
                    </a>
                </li>
                @endcan
            </ul>
{{--            <div>--}}
{{--                <!-- Heading -->--}}
{{--                <h6 class="navbar-heading text-muted">Admin Settings</h6>--}}
{{--                <!-- Navigation -->--}}
{{--                <ul class="navbar-nav mb-md-3">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">--}}
{{--                            <i class="ni ni-spaceship"></i> Getting started--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">--}}
{{--                            <i class="ni ni-palette"></i> Foundation--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">--}}
{{--                            <i class="ni ni-ui-04"></i> Components--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
            <div>
                <h6 class="navbar-heading text-muted">Admin Settings</h6>
                <ul class="navbar-nav">
                    @can('manage', App\User::class)
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">
                            <i class="fa fa-user"></i> Admins
                        </a>
                    </li>
                    @endcan
                    @can('manage-invites')
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('users') ? 'active' : '' }}" href="{{ route('users') }}">
                            <i class="fa fa-user"></i> Users
                        </a>
                    </li>
                    @endcan
                    @can('manage-locale')
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('locale-settings') ? 'active' : '' }}" href="{{ route('locale-settings') }}">
                            <i class="fa fa-language"></i> Locale Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('list-announcements') ? 'active' : '' }}" href="{{ route('list-announcements') }}">
                            <i class="fa fa-bullhorn"></i> Announcements
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</nav>
