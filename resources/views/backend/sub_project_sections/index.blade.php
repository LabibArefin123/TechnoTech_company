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

                    @foreach ($data as $group)
                        @php
                            $first = $group->first();
                        @endphp

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $first->project->title ?? 'N/A' }}
                                </span>
                            </td>

                            <td>

                                @foreach ($group->take(4) as $image)
                                    <img src="{{ asset($image->image) }}" width="50" class="me-1 rounded border">
                                @endforeach

                                @if ($group->count() > 4)
                                    <span class="badge bg-info">

                                        +{{ $group->count() - 4 }}

                                    </span>
                                @endif

                            </td>

                            <td>

                                {{ $first->title }}

                            </td>

                            <td>

                                @if ($first->is_active)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Hidden
                                    </span>
                                @endif

                            </td>

                            <td>

                                <a href="{{ route('sub_project_sections.show', $first->id) }}"
                                    class="btn btn-primary btn-sm">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('sub_project_sections.edit', $first->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop
