@extends('adminlte::page')

@section('title', 'Add About Section')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Add About Section</h3>

        <a href="{{ route('about_sections.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop


@section('content')

    <div class="card shadow-lg">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('about_sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label><strong>Title *</strong></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Tagline</strong></label>
                        <input type="text" name="tagline" class="form-control" value="{{ old('tagline') }}">
                    </div>

                    <div class="col-md-12 form-group">
                        <label><strong>Paragraph 1 *</strong></label>
                        <textarea name="paragraph_1" class="form-control" rows="3">{{ old('paragraph_1') }}</textarea>
                    </div>

                    <div class="col-md-12 form-group">
                        <label><strong>Paragraph 2</strong></label>
                        <textarea name="paragraph_2" class="form-control" rows="3">{{ old('paragraph_2') }}</textarea>
                    </div>

                    <div class="col-md-12 form-group">
                        <label><strong>Paragraph 3</strong></label>
                        <textarea name="paragraph_3" class="form-control" rows="3">{{ old('paragraph_3') }}</textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Mission Title</strong></label>
                        <input type="text" name="mission_title" class="form-control" value="{{ old('mission_title') }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Vision Title</strong></label>
                        <input type="text" name="vision_title" class="form-control" value="{{ old('vision_title') }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Mission Text</strong></label>
                        <textarea name="mission_text" class="form-control" rows="3">{{ old('mission_text') }}</textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Vision Text</strong></label>
                        <textarea name="vision_text" class="form-control" rows="3">{{ old('vision_text') }}</textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Image 1 *</strong></label>
                        <input type="file" name="image_1" class="form-control">
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Image 2 *</strong></label>
                        <input type="file" name="image_2" class="form-control">
                    </div>

                    <div class="col-md-6 form-group">
                        <label><strong>Status</strong></label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save About Section
                    </button>
                </div>

            </form>

        </div>
    </div>

@stop
