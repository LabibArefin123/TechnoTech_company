<link rel="stylesheet" href="{{ asset('css/frontend/custom_navbar.css') }}">

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white"
    style="padding-left: 30px; padding-right: 30px;">
    <div class="container-fluid">

        {{-- Logo --}}
        <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center">
            @php
                $logoPath = null;

                if (!empty($orgPicture)) {
                    foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                        $path = public_path('uploads/images/backend/organization/' . $orgPicture . '.' . $ext);
                        if (file_exists($path)) {
                            $logoPath = asset('uploads/images/backend/organization/' . $orgPicture . '.' . $ext);
                            break;
                        }
                    }
                }
            @endphp

            @if ($logoPath)
                <img src="{{ $logoPath }}" alt="{{ $orgName }}" class="brand-image elevation-3"
                    style="width:300px; height:70px; object-fit:contain;">
            @else
                <img src="{{ asset('uploads/images/logo.png') }}" alt="TechnoTech Engineering Ltd"
                    class="brand-image elevation-3" style="width:300px; height:70px; object-fit:contain;">
            @endif
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Center Menu --}}
        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="{{ route('welcome') }}"
                        class="nav-link custom-link {{ request()->routeIs('welcome') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#about" class="nav-link custom-link">
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#services" class="nav-link custom-link">
                        Services
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#activities" class="nav-link custom-link">
                        Key Activities
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#projects" class="nav-link custom-link">
                        Projects
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#news" class="nav-link custom-link">
                        News
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link custom-link">
                        Contact
                    </a>
                </li>

            </ul>
        </div>

        {{-- Right CTA --}}
        <div class="d-flex align-items-center">
            <button class="btn quote-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                Get a Quote
            </button>
        </div>

    </div>
</nav>
