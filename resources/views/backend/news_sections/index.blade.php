@extends('adminlte::page')

@section('title', 'News Sections')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <h3>News Sections</h3>

        <a href="{{ route('news_sections.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add Section
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
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($sections as $key => $section)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $section->title }}</td>
                            <td>{{ $section->subtitle }}</td>
                            <td>
                                <a href="{{ route('news_sections.show', $section->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('news_sections.edit', $section->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('news_sections.destroy', $section->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this section?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No News Section Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
