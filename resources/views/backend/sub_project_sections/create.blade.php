@extends('adminlte::page')

@section('title', 'Create Sub Project')

@section('content')

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
                        <input type="file" name="image" class="form-control">
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
