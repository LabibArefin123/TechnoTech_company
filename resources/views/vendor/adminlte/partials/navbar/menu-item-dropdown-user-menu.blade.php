@php
    $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout');
    $profile_url = View::getSection('profile_url') ?? 'user_profile';
@endphp

@if (config('adminlte.usermenu_profile_url', false))
    @php($profile_url = Auth::user()->adminlte_profile_url())
@endif

@if (config('adminlte.use_route_url', false))
    @php($profile_url = $profile_url ? route($profile_url) : '')
    @php($logout_url = $logout_url ? route($logout_url) : '')
@else
    @php($profile_url = $profile_url ? url($profile_url) : '')
    @php($logout_url = $logout_url ? url($logout_url) : '')
@endif

<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
        @if (config('adminlte.usermenu_image'))
            <img src="{{ Auth::user()->adminlte_image() }}" class="user-image img-circle elevation-2 mr-2"
                style="width:32px; height:32px; object-fit:cover;" alt="{{ Auth::user()->name }}">
        @endif

        <span class="d-none d-md-inline font-weight-semibold">
            {{ Auth::user()->name }}
        </span>
    </a>

    {{-- Dropdown --}}
    <div class="dropdown-menu dropdown-menu-right shadow-lg border-0 p-0" style="min-width: 260px;">

        {{-- User Header --}}
        <div class="p-3 bg-gradient-primary text-white text-center">
            <img src="{{ Auth::user()->adminlte_image() }}" class="img-circle elevation-2 mb-2"
                style="width:60px; height:60px; object-fit:cover;" alt="{{ Auth::user()->name }}">

            <div class="font-weight-bold">{{ Auth::user()->name }}</div>
            <small class="text-light">
                {{ Auth::user()->email ?? 'User Account' }}
            </small>
        </div>

        {{-- Menu Items --}}
        <div class="py-1">

            <a href="{{ $profile_url ?? '#' }}" class="dropdown-item d-flex align-items-center px-3 py-2">
                <i class="fas fa-user-circle text-primary mr-2"></i>
                <span>My Profile</span>
            </a>

            <a href="{{ route('settings.index') }}" class="dropdown-item d-flex align-items-center px-3 py-2">
                <i class="fas fa-cog text-secondary mr-2"></i>
                <span>Settings</span>
            </a>

        </div>

        <div class="dropdown-divider m-0"></div>

        {{-- Logout --}}
        <div class="p-2">
            <a href="#" class="btn btn-outline-danger btn-block"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
            </a>
        </div>

        <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
            @if (config('adminlte.logout_method'))
                {{ method_field(config('adminlte.logout_method')) }}
            @endif
            {{ csrf_field() }}
        </form>

    </div>

</li>
