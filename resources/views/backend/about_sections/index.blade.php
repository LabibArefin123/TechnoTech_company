@extends('adminlte::page')

@section('title', 'About Sections')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">About Sections</h3>
        <a href="{{ route('about_sections.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add About Section
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
                        <th>Title</th>
                        <th>Tagline</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Status</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $key => $about)
                        <tr>

                            <td>{{ $key + 1 }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->tagline }}</td>
                            <td>
                                @if ($about->image_1)
                                    <img src="{{ asset($about->image_1) }}" width="80">
                                @endif
                            </td>
                            <td>
                                @if ($about->image_2)
                                    <img src="{{ asset($about->image_2) }}" width="80">
                                @endif
                            </td>
                            <td>
                                @if ($about->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('about_sections.show', $about->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('about_sections.edit', $about->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('about_sections.destroy', $about->id) }}" method="POST"
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
                text: "This will be deleted!",
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
