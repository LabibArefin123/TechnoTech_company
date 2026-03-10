@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Projects</h3>
        <a href="{{ route('project_sections.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add Project
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $key => $project)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if ($project->image)
                                    <img src="{{ asset($project->image) }}" width="80">
                                @endif
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->category }}</td>
                            <td>
                                @if ($project->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('project_sections.show', $project->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('project_sections.edit', $project->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('project_sections.destroy', $project->id) }}" method="POST"
                                    style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm delete-confirm">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('js')

    <script>
        $('.delete-confirm').click(function(event) {

            var form = $(this).closest("form");

            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "This project will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes delete it!'
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });
    </script>

@stop
