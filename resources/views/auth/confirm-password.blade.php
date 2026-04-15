@extends('frontend.layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="login-glass">

            {{-- LEFT : ABOUT --}}
            @include('auth.custom_login_page.left')

            {{-- RIGHT : CONFIRM PASSWORD --}}
            <div class="login-panel">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">Confirm Password</h4>
                    <p class="text-muted">Secure Area Access</p>
                </div>

                <div class="mb-3 text-muted">
                    This is a secure area of the application. Please confirm your password before continuing.
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    {{-- PASSWORD --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Password</label>

                        <input type="password" name="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter your password" required autocomplete="current-password">

                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <button class="btn login-btn w-100 py-2 rounded-pill">
                        Confirm Password
                    </button>

                    {{-- BACK --}}
                    <div class="text-center mt-3">
                        <a href="{{ url()->previous() }}" class="text-decoration-none dev-link">
                            ← Go Back
                        </a>
                    </div>
                </form>
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
