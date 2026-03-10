@extends('adminlte::page')

@section('title', 'News List')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>News List</h3>
        <a href="{{ route('news.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add News
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->author }}</td>

                            <td>

                                @if ($item->news_date)
                                    {{ \Carbon\Carbon::parse($item->news_date)->format('d M Y') }}
                                @endif
                            </td>

                            <td>
                                @if ($item->type == 'featured')
                                    <span class="badge bg-warning">
                                        Featured
                                    </span>
                                @else
                                    <span class="badge bg-info">
                                        List
                                    </span>
                                @endif
                            </td>

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
                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('news.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this news?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                No News Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
