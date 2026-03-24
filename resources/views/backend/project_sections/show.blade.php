@extends('adminlte::page')

@section('title', 'View Project')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Project Section Details</h3>
        <div>
            <a href="{{ route('project_sections.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('project_sections.edit', $project->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
@stop


@section('content')

    <div class="card">
        <div class="card-body">

            <h4>{{ $project->title }}</h4>

            <p><strong>Category:</strong> {{ $project->category }}</p>

            <p><strong>Status:</strong>
                @if ($project->status)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
            </p>

            <img src="{{ asset($project->image) }}" width="300">

        </div>
    </div>

@stop
