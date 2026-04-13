@extends('adminlte::page')

@section('title', 'Edit Sub Project')

@section('content_header')
    <h4>✏️ Edit Sub Project</h4>
@stop

@section('content')

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('sub_project_sections.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Project --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Project</label>
                        <select name="project_id" class="form-control">
                            @foreach ($projects as $id => $title)
                                <option value="{{ $id }}" {{ $item->project_id == $id ? 'selected' : '' }}>
                                    {{ $title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $item->title }}" class="form-control"
                            placeholder="Enter title">
                    </div>

                    {{-- Image Upload --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    {{-- Current Image --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="{{ asset($item->image) }}" class="img-thumbnail" style="height:120px;">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ $item->is_active ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ !$item->is_active ? 'selected' : '' }}>
                                Hidden
                            </option>
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <button class="btn btn-primary px-4">
                        Update
                    </button>

                    <a href="{{ route('sub_project_sections.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </form>

        </div>
    </div>

@endsection
