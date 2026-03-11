@extends('adminlte::page')

@section('title', 'Create Activity')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Create Activity</h3>
        <a href="{{ route('key_activities.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('key_activities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Activity Title">
                    </div>

                    <div class="col-md-6">
                        <label>Icon (Bootstrap Icon)</label>
                        <input type="text" name="icon" class="form-control"
                            placeholder="Example: bi-lightning-charge">
                        <small class="text-muted">
                            Example icons: bi-lightning-charge, bi-gear, bi-building
                        </small>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Serial</label>
                        <input type="number" name="serial" class="form-control" placeholder="1">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>Activity Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Write activity description"></textarea>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i>
                        Save Activity
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
