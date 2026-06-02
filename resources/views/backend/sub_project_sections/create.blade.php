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
    <div class="card">
        <div class="card-body">

            <form action="{{ route('sub_project_sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Project</label>
                        <select name="project_id" class="form-control">
                            @foreach ($projects as $id => $title)
                                <option value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image[]" multiple class="form-control">
                    </div>

                    <div id="uploadStage" class="alert alert-info">
                        Waiting...
                    </div>

                    <div id="previewContainer" class="row g-3">
                    </div>

                    <div id="imageQueue" class="mt-3">
                    </div>

                    <div id="dropZone" class="border rounded p-5 text-center">
                        Drag Images Here
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Hidden</option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-success">Save</button>

            </form>

        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('js/backend/project_page/sub_project/create.js') }}"></script>
@endsection
