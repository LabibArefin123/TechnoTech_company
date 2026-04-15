@extends('frontend.layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="login-glass">

            {{-- LEFT (reuse About section) --}}
            @include('auth.custom_login_page.left')

            {{-- RIGHT : FORGOT PASSWORD --}}
            <div class="login-panel">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">Forgot Password</h4>
                    <p class="text-muted">Reset your account password</p>
                </div>

                <div class="mb-3 text-sm text-muted">
                    Enter your email and we’ll send you a reset link.
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autofocus>

                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn login-btn w-100 py-2 rounded-pill mt-3">
                        Send Reset Link
                    </button>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-decoration-none dev-link">
                            ← Back to Login
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
