@extends('adminlte::page')

@section('title', 'Key Activities')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Key Activities</h3>
        <a href="{{ route('key_activities.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add Activity
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Serial</th>
                        <th>Status</th>
                        <th width="18%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $key => $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td width="90">
                                <img src="{{ $item->image
                                    ? asset('uploads/images/welcome_page/key_activities/' . $item->image)
                                    : asset('uploads/images/default.jpg') }}"
                                    width="70" class="img-thumbnail">
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <i class="bi {{ $item->icon }}"></i>
                                <span class="text-muted ms-2">{{ $item->icon }}</span>
                            </td>
                            <td>{{ $item->serial }}</td>
                            <td>
                                @if ($item->status)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('key_activities.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('key_activities.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('key_activities.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this activity?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No Activities Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
