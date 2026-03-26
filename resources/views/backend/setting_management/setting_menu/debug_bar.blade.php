@extends('adminlte::page')

@section('title', 'Debugbar Settings')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Debugbar Settings</h3>

        <a href="{{ route('settings.index') }}" class="btn btn-sm btn-warning">
            <i class="fas fa-arrow-left"></i> Go Back
        </a>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{ route('settings.debugbar.update') }}" method="POST">
                        @csrf

                        {{-- Debugbar Toggle --}}
                        <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-4 bg-light">
                            <div>
                                <h6 class="mb-1">Laravel Debugbar</h6>
                                <small class="text-muted">
                                    Enable or disable debug toolbar
                                </small>
                            </div>

                            <div class="form-check form-switch form-switch-lg">
                                <input class="form-check-input" type="checkbox" name="is_debugbar" value="1"
                                    {{ $user->is_debugbar ? 'checked' : '' }}>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <small class="text-muted">
                                Current Status:
                                <span class="{{ $user->is_debugbar ? 'text-success' : 'text-danger' }}">
                                    {{ $user->is_debugbar ? 'ON (Debugbar Enabled)' : 'OFF (Debugbar Disabled)' }}
                                </span>
                            </small>
                        </div>

                        {{-- Info --}}
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            Debugbar shows queries, logs, and performance info.
                        </div>

                        {{-- Save Button --}}
                        <div class="text-right">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
@stop
