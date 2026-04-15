<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        $seo = \App\Models\SeoSetting::first();
    @endphp
    <link rel="icon" type="image/png" href="{{ asset('uploads/images/icon.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $seo->meta_description ?? 'TechnoTech Engineering Ltd.' }}">
    <meta name="keywords" content="{{ $seo->meta_keywords ?? 'engineering, technology, bangladesh' }}">
    <meta name="author" content="TechnoTech">

    <!-- OpenGraph -->
    <meta property="og:title" content="{{ $seo->og_title ?? config('app.name') }}">
    <meta property="og:image" content="{{ asset($seo->og_image ?? 'uploads/default-seo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="settings-update-url" content="{{ route('settings.update') }}">

    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ config('app.name', 'TechnoTech Engineering Ltd.') }}
        @endif
    </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/frontend/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/setting_button/button.css') }}">
</head>

<body>
    <div id="app">
        <!-- Scroll Progress Bar -->

        <div id="scrollProgress"
            style="position: fixed; top: 0; left: 0; width: 0%; height: 4px; background-color: #ff6b6b; z-index: 9999; transition: width 0.25s ease;">
        </div>
        @if (!request()->routeIs(['login', 'register', 'password.*']))
            <div id="google_translate_element"></div>
        @endif
        <main class="">
            @yield('content')
        </main>
        @include('frontend.components.quote_modal')
        @include('frontend.components.location_modal_t')
        @include('frontend.components.phone_modal_t')
        @include('frontend.components.email_modal_footer')
        @include('frontend.components.phone_modal_footer')
        @include('frontend.components.location_modal_footer')
        @if (!request()->routeIs(['login', 'register', 'password.*']))
            .
            @include('frontend.components.setting_float_modal')
        @endif
    </div>
    <!-- Bootstrap JS + dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,bn',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>

    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
        AOS.init({
            duration: 1000, // Animation duration
            easing: 'ease-in-out', // Easing style
            once: true, // Only animate once
        });
    </script>

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top" aria-label="Back to Top">
        <i class="bi bi-arrow-up"></i>
    </button>
    <script>
        window.appData = {
            success: @json(session('success')),
            errors: @json($errors->all())
        };
    </script>
    <script>
        window.appSettings = @json($settings);
    </script>

</body>

</html>
