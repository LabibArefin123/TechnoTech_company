@extends('frontend.layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="login-glass" id="sliderContainer">
            @include('auth.custom_login_page.left')
            @include('auth.custom_login_page.right')
        </div>
    </div>
    {{-- STYLES --}}
    <style>
        body {
            background: url('{{ asset('uploads/images/login_page/background.jpg') }}') center/cover no-repeat;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/backend/custom_login.css') }}">

    @include('auth.custom_login_page.modal.problem')
@endsection
