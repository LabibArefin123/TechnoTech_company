@extends('adminlte::page')

@section('title', 'Edit News')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <h3>Edit News</h3>

        <a href="{{ route('news.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>

    </div>

@stop


@section('content')

    <div class="card shadow-lg">

        <div class="card-body">

            <form action="{{ route('news.update', $news->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">
                        <label>Category</label>
                        <input type="text" name="category" value="{{ $news->category }}" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $news->title }}" class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Author</label>
                        <input type="text" name="author" value="{{ $news->author }}" class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>News Date</label>
                        <input type="date" name="news_date" value="{{ $news->news_date }}" class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Type</label>
                        <select name="type" class="form-control">
                            <option value="list" {{ $news->type == 'list' ? 'selected' : '' }}>
                                List News
                            </option>
                            <option value="featured" {{ $news->type == 'featured' ? 'selected' : '' }}>
                                Featured Video
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ $news->status == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>Video URL (For Featured News)</label>
                        <input type="text" name="video_url" value="{{ $news->video_url }}" class="form-control">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ $news->description }}</textarea>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update News
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
