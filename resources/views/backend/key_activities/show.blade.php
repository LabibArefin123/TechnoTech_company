@extends('adminlte::page')

@section('title', 'View Activity')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Activity Details</h3>
        <div>
            <a href="{{ route('key_activities.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('key_activities.edit', $activity->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card border-left-primary h-100">
                        <div class="card-body">
                            <label class="text-muted small">Title</label>
                            <h5 class="fw-bold">
                                {{ $activity->title }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-info h-100">
                        <div class="card-body">
                            <label class="text-muted small">Icon</label>
                            <h5>
                                <i class="bi {{ $activity->icon }}"></i>
                                <span class="ms-2">{{ $activity->icon }}</span>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-success h-100">
                        <div class="card-body">
                            <label class="text-muted small">Serial</label>
                            <h5 class="fw-bold">
                                {{ $activity->serial }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-warning h-100">
                        <div class="card-body">
                            <label class="text-muted small">Status</label>
                            <h5>
                                @if ($activity->status)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>

                @if ($activity->image)
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <label class="text-muted small">Activity Image</label>
                                <br>
                                <img src="{{ asset($activity->image) }}" class="img-fluid rounded mt-2"
                                    style="max-height:300px">
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                         <label class="text-muted small">Description</label>
                            <p class="mt-2">
                                {{ $activity->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
