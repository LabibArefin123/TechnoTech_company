@extends('adminlte::page')

@section('title', 'Edit Project')

@section('content_header')
    <h3>Edit Project</h3>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('project_sections.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $project->title }}">
                    </div>

                    <div class="col-md-6">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" value="{{ $project->category }}">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">

                        @if ($project->image)
                            <img src="{{ asset($project->image) }}" width="120" class="mt-2">
                        @endif
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="mt-3 text-end">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

@stop
