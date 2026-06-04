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

                            <td style="min-width:500px;">

                                <div class="d-flex flex-wrap gap-2">

                                    @foreach ($group->take(5) as $image)
                                        <div>
                                            <img src="{{ asset($image->image) }}" class="galleryZoom"
                                                data-image="{{ asset($image->image) }}"
                                                style="
                                                 width:90px;
                                                 height:70px;
                                                 object-fit:cover;
                                                 border-radius:8px;
                                                 cursor:pointer;
                                                 transition:.3s;">
                                        </div>
                                    @endforeach

                                </div>

                                @if ($group->count() > 5)
                                    <div class="mt-2">

                                        <span class="badge bg-info">

                                            Showing 5 of {{ $group->count() }} Images

                                        </span>

                                    </div>
                                @endif

                            </td>
                            <td style="min-width:300px;">

                                <div style=" max-height:120px;overflow-y:auto;">

                                    <ul class="mb-0 ps-3">

                                        @foreach ($group as $gallery)
                                            <li class="mb-1">

                                                {{ $gallery->title ?: 'No Title' }}

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                                @if ($group->count() > 5)
                                    <small class="text-muted">

                                        Total Titles:
                                        {{ $group->count() }}

                                    </small>
                                @endif

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
