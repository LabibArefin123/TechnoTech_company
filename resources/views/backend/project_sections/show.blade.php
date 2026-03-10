@extends('adminlte::page')

@section('title', 'View Project')

@section('content_header')
    <h3>Project Details</h3>
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
