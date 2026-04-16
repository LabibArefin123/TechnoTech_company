@extends('adminlte::page')

@section('title', 'Edit User Profile')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Edit Profile</h1>
         <a href="{{ route('user_profile_show') }}"
            class="btn btn-sm btn-secondary d-flex align-items-center gap-2 back-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Back
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user_profile_update') }}" method="POST" enctype="multipart/form-data"
                id="profileUpdateForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                            >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control @error('username') is-invalid @enderror"
                            value="{{ old('username', $user->username) }}" >
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone_2">Phone 2</label>
                        <input type="text" name="phone_2" id="phone_2"
                            class="form-control @error('phone_2') is-invalid @enderror"
                            value="{{ old('phone_2', $user->phone_2) }}">
                        @error('phone_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture"
                            class="form-control @error('profile_picture') is-invalid @enderror">
                        @error('profile_picture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="current_password">Current Password</label>
                        <div class="input-group">
                            <input type="password" name="current_password" id="current_password" class="form-control"
                                >
                            <button type="button" class="btn btn-outline-secondary toggle-password"
                                data-target="current_password">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="new_password">New Password</label>
                        <div class="input-group">
                            <input type="password" name="new_password" id="new_password" class="form-control" >
                            <button type="button" class="btn btn-outline-secondary toggle-password"
                                data-target="new_password">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="confirm_password">Confirm New Password</label>
                        <div class="input-group">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                >
                            <button type="button" class="btn btn-outline-secondary toggle-password"
                                data-target="confirm_password">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <div class="mt-4" style="height:50px;"></div>
            </form>
        </div>

    </div>
@endsection
