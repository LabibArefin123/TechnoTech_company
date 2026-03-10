@extends('adminlte::page')

@section('title', 'Edit About Section')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Edit About Section</h3>

        <a href="{{ route('about_sections.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop

@section('content')

    <div class="card shadow-lg">
        <div class="card-body">

            <form action="{{ route('about_sections.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Tagline</label>
                        <input type="text" name="tagline" class="form-control" value="{{ $about->tagline }}">
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Paragraph 1</label>
                        <textarea name="paragraph_1" class="form-control">{{ $about->paragraph_1 }}</textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Mission Title</label>
                        <input type="text" name="mission_title" class="form-control" value="{{ $about->mission_title }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Vision Title</label>
                        <input type="text" name="vision_title" class="form-control" value="{{ $about->vision_title }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Mission Text</label>
                        <textarea name="mission_text" class="form-control">{{ $about->mission_text }}</textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Vision Text</label>
                        <textarea name="vision_text" class="form-control">{{ $about->vision_text }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label>Image 1</label>
                        <input type="file" name="image_1" class="form-control">

                        @if ($about->image_1)
                            <img src="{{ asset($about->image_1) }}" width="120" class="mt-2">
                        @endif

                    </div>

                    <div class="col-md-6">
                        <label>Image 2</label>
                        <input type="file" name="image_2" class="form-control">

                        @if ($about->image_2)
                            <img src="{{ asset($about->image_2) }}" width="120" class="mt-2">
                        @endif

                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $about->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $about->status == 0 ? 'selected' : '' }}>Inactive</option>
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
