<link rel="stylesheet" href="{{ asset('css/frontend/custom_navbar.css') }}">

<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">

    <div class="container">

        <a href="{{ route('welcome') }}" class="navbar-brand fw-bold">
            {{ $orgName ?? 'TechnoTech' }}
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar2">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbar2">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('welcome') }}"
                        class="nav-link custom-link {{ request()->routeIs('welcome') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('welcome') }}#about" class="nav-link custom-link">About Us</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('welcome') }}#services" class="nav-link custom-link">Services</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('welcome') }}#activities" class="nav-link custom-link">Key Activities</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('welcome') }}#projects" class="nav-link custom-link">Projects</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('welcome') }}#news" class="nav-link custom-link">News</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link custom-link">
                        Contact
                    </a>
                </li>

            </ul>
        </div>
        <a class="btn btn-warning openQuote">
            Get Quote
        </a>

    </div>

</nav>
