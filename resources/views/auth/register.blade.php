@extends('frontend.layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="login-glass">

            {{-- LEFT : ABOUT --}}
            @include('auth.custom_login_page.left')

            {{-- RIGHT : REGISTER --}}
            <div class="login-panel">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">Create Account</h4>
                    <p class="text-muted">Register your account</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- NAME --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="name"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required autofocus>

                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- PHONE --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input type="text" name="phone_1"
                            class="form-control form-control-lg @error('phone_1') is-invalid @enderror"
                            value="{{ old('phone_1') }}" required>

                        @error('phone_1')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>

                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" required>

                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                            required>

                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <button class="btn login-btn w-100 py-2 rounded-pill">
                        Register
                    </button>

                    {{-- LOGIN LINK --}}
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-decoration-none dev-link">
                            Already have an account? Login
                        </a>
                    </div>
                </form>

                {{-- OPTIONAL HELPDESK --}}
                <hr class="my-4">
                <div class="text-center small text-muted">
                    <p class="mb-1">Helpdesk</p>
                    <p class="mb-1">
                        <a href="tel:+8801776197999" class="text-decoration-none">(+88)01776197999</a>
                    </p>
                    <p>
                        <a href="mailto:mdlabibarefin@gmail.com" class="text-decoration-none">
                            mdlabibarefin@gmail.com
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{-- SAME BACKGROUND --}}
    <style>
        body {
            background: url('{{ asset('uploads/images/login_page/background.jpg') }}') center/cover no-repeat;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/backend/custom_login.css') }}">
@endsection
