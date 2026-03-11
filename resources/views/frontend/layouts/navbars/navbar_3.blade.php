<link rel="stylesheet" href="{{ asset('css/frontend/custom_navbar.css') }}">

<!-- TOP BAR -->
<div style="background:#198754;color:white;padding:6px 0;font-size:14px;">
    <div class="container d-flex justify-content-between">

        <div>
            Engineering Excellence Since 2005
        </div>

        <div>
            Call : +880-123456789
        </div>

    </div>
</div>

<!-- MAIN NAVBAR -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

    <div class="container">

        <a href="{{ route('welcome') }}" class="navbar-brand fw-bold">
            {{ $orgName ?? 'TechnoTech' }}
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar3">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbar3">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="#about" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="#services" class="nav-link">Services</a>
                </li>

                <li class="nav-item">
                    <a href="#activities" class="nav-link">Activities</a>
                </li>

                <li class="nav-item">
                    <a href="#projects" class="nav-link">Projects</a>
                </li>

                <li class="nav-item">
                    <a href="#news" class="nav-link">News</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>

            </ul>

        </div>

        <a class="btn btn-success">
            Get Quote
        </a>

    </div>

</nav>
