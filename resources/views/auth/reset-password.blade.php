@extends('frontend.layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="login-glass">

            {{-- LEFT : ABOUT (reuse same) --}}
            @include('auth.custom_login_page.left')

            {{-- RIGHT : RESET PASSWORD --}}
            <div class="login-panel">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">Reset Password</h4>
                    <p class="text-muted">Create a new secure password</p>
                </div>

                <div class="mb-3 text-sm text-muted">
                    Enter your email and choose a new password to secure your account.
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    {{-- TOKEN --}}
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            value="{{ old('email', $request->email) }}" required autofocus>

                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">New Password</label>
                        <input type="password" name="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter new password" required>

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
                            placeholder="Confirm password" required>

                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <button class="btn login-btn w-100 py-2 rounded-pill">
                        Reset Password
                    </button>

                    {{-- BACK LINK --}}
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
