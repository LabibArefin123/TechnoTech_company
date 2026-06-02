@extends('adminlte::page')

@section('title', 'Sub Projects')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h4>📂 Sub Project Management</h4>
        <a href="{{ route('sub_project_sections.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-lg">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover" id="dataTables">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $row)
                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $row->project->title ?? 'N/A' }}
                                </span>
                            </td>

                            <td>
                                <img src="{{ asset($row->image) }}" width="60">
                            </td>

                            <td>{{ $row->title }}</td>

                            <td>
                                @if ($row->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Hidden</span>
                                @endif
                            </td>

                            <td>
                                ...
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
