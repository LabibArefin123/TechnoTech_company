@extends('adminlte::page')

@section('title', 'Create Sub Project')

@section('content')
    <style>
        .status-circle {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
    <div class="card shadow">

        <div class="card-header">
            <h4>
                📂 Create Sub Project Gallery
            </h4>
        </div>

        <div class="card-body">

            <form id="subProjectForm" action="{{ route('sub_project_sections.store') }}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>
                            Project
                        </label>

                        <select name="project_id" class="form-control" required>

                            @foreach ($projects as $id => $title)
                                <option value="{{ $id }}">
                                    {{ $title }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>
                            Status
                        </label>

                        <select name="is_active" class="form-control">

                            <option value="1">
                                Active
                            </option>

                            <option value="0">
                                Hidden
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>
                            Images
                        </label>

                        <input type="file" name="image[]" id="imageInput" multiple class="form-control" required>

                    </div>

                </div>

                <div id="uploadStage" class="alert alert-info">

                    Waiting For Upload...

                </div>

                <div id="imageQueue" class="mb-3">

                </div>

                <div id="dynamicTitles" class="row">

                </div>

                <div id="previewContainer" class="row">

                </div>

                <div id="dropZone" class="border rounded p-5 text-center mt-3">

                    📁 Drag & Drop Images Here

                </div>

                <hr>

                <button class="btn btn-success">

                    Save Gallery

                </button>

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

    <script src="{{ asset('js/backend/project_page/sub_project/create.js') }}"></script>

@endsection
