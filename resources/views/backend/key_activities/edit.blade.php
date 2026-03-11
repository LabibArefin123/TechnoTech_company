@extends('adminlte::page')

@section('title', 'Edit Activity')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Edit Activity</h3>
        <a href="{{ route('key_activities.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('key_activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $activity->title }}" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Icon (Bootstrap Icon)</label>
                        <input type="text" name="icon" value="{{ $activity->icon }}" class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Serial</label>
                        <input type="number" name="serial" value="{{ $activity->serial }}" class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $activity->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ $activity->status == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>


                    <div class="col-md-12 mt-3">
                        <label>Activity Image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($activity->image)
                            <div class="mt-2">

                                <img src="{{ asset($activity->image) }}" width="120" class="img-thumbnail">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ $activity->description }}</textarea>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Update Activity
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
