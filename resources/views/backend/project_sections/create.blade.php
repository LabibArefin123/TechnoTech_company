@extends('adminlte::page')

@section('title', 'Add Project')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">
        <h3>Add Project</h3>

        <a href="{{ route('project_sections.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>

    </div>

@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('project_sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <label>Project Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Project Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i> Save Project
                    </button>
                </div>

            </form>

        </div>
    </div>

@stop
