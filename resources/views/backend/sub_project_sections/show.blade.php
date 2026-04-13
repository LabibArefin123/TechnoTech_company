@extends('adminlte::page')

@section('title', 'View Sub Project')

@section('content_header')
    <h4>👁️ Sub Project Details</h4>
@stop

@section('content')

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row">

                {{-- Project Name --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Project</label>
                    <div class="form-control bg-light">
                        {{ $item->project->title ?? 'N/A' }}
                    </div>
                </div>

                {{-- Title --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Title</label>
                    <div class="form-control bg-light">
                        {{ $item->title ?? 'N/A' }}
                    </div>
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Status</label>
                    <div class="form-control bg-light">
                        @if ($item->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Hidden</span>
                        @endif
                    </div>
                </div>

                {{-- Image --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Image</label><br>
                    <img src="{{ asset($item->image) }}" class="img-fluid rounded shadow" style="max-height:200px;">
                </div>

            </div>

            <div class="mt-3">
                <a href="{{ route('sub_project_sections.edit', $item->id) }}" class="btn btn-primary">
                    Edit
                </a>

                <a href="{{ route('sub_project_sections.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>

        </div>
    </div>

@endsection
