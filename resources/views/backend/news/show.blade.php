@extends('adminlte::page')

@section('title', 'View News')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>News Details</h3>
        <div>
            <a href="{{ route('news.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card border-left-primary h-100">
                        <div class="card-body">
                            <label class="text-muted small">Title</label>
                            <h5 class="fw-bold">
                                {{ $news->title }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-info h-100">
                        <div class="card-body">
                            <label class="text-muted small">Category</label>
                            <h5 class="fw-bold">
                                {{ $news->category }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-success h-100">
                        <div class="card-body">
                            <label class="text-muted small">Author</label>
                            <h5 class="fw-bold">
                                {{ $news->author ?? 'N/A' }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-warning h-100">
                        <div class="card-body">
                            <label class="text-muted small">News Date</label>
                            <h5 class="fw-bold">
                                @if ($news->news_date)
                                    {{ \Carbon\Carbon::parse($news->news_date)->format('d M Y') }}
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-dark h-100">
                        <div class="card-body">
                            <label class="text-muted small">Type</label>
                            <h5>
                                @if ($news->type == 'featured')
                                    <span class="badge bg-warning">Featured Video</span>
                                @else
                                    <span class="badge bg-info">List News</span>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-secondary h-100">
                        <div class="card-body">
                            <label class="text-muted small">Status</label>
                            <h5>
                                @if ($news->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>

                @if ($news->video_url)
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <label class="text-muted small">Video URL</label>
                                <p class="fw-bold">
                                    <a href="{{ $news->video_url }}" target="_blank">
                                        {{ $news->video_url }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <label class="text-muted small">Description</label>
                            <p class="mt-2">
                                {{ $news->description ?? 'No description available.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
