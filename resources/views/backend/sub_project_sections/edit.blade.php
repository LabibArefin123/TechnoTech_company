@extends('adminlte::page')

@section('title', 'Edit Sub Project')

@section('content_header')
    <h4>✏️ Edit Sub Project Gallery</h4>
@stop

@section('content')

    <style>
        .preview-card {
            position: relative;
            margin-bottom: 15px;
        }

        .preview-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .status-circle {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>

    <div class="card shadow">

        <div class="card-header">
            <h4>📂 Edit Gallery Image</h4>
        </div>

        <div class="card-body">

            <form id="subProjectEditForm" action="{{ route('sub_project_sections.update', $item->id) }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Project --}}
                    <div class="col-md-6 mb-3">
                        <label>Project</label>

                        <select name="project_id" class="form-control" required>
                            @foreach ($projects as $id => $title)
                                <option value="{{ $id }}" {{ $item->project_id == $id ? 'selected' : '' }}>
                                    {{ $title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label>Status</label>

                        <select name="is_active" class="form-control">
                            <option value="1" {{ $item->is_active ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ !$item->is_active ? 'selected' : '' }}>
                                Hidden
                            </option>
                        </select>
                    </div>

                    {{-- Title --}}
                    <div class="col-md-12 mb-3">
                        <label>Image Title</label>

                        <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control"
                            placeholder="Enter Image Title">
                    </div>

                    {{-- Upload New Image --}}
                    <div class="col-md-12 mb-3">

                        <label>Replace Image</label>

                        <input type="file" name="image" id="imageInput" class="form-control">

                    </div>

                </div>

                {{-- Upload Status --}}
                <div id="uploadStage" class="alert alert-info">
                    Waiting For Upload...
                </div>

                {{-- Queue --}}
                <div id="imageQueue"></div>

                {{-- Preview --}}
                <div id="previewContainer" class="row">

                    <div class="col-md-4">

                        <div class="preview-card">

                            <img src="{{ asset($item->image) }}" id="currentImagePreview" class="img-thumbnail">

                        </div>

                    </div>

                </div>

                {{-- Drag & Drop --}}
                <div id="dropZone" class="border rounded p-5 text-center mt-3">

                    📁 Drag & Drop New Image Here

                </div>

                <hr>

                <button class="btn btn-primary">
                    Update Gallery
                </button>

                <a href="{{ route('sub_project_sections.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

@endsection

@section('js')

    <script src="{{ asset('js/backend/project_page/sub_project/image-preview.js') }}"></script>

    <script src="{{ asset('js/backend/project_page/sub_project/image-validation.js') }}"></script>

    <script src="{{ asset('js/backend/project_page/sub_project/upload-progress.js') }}"></script>

    <script src="{{ asset('js/backend/project_page/sub_project/image-queue.js') }}"></script>

    <script src="{{ asset('js/backend/project_page/sub_project/drag-drop.js') }}"></script>

    <script src="{{ asset('js/backend/project_page/sub_project/unsaved-changes.js') }}"></script>

    <script src="{{ asset('js/backend/project_page/sub_project/edit.js') }}"></script>

@endsection
