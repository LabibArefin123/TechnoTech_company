@extends('adminlte::page')

@section('title', 'View News Section')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>News Section Details</h3>
        <div>
            <a href="{{ route('news_sections.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('news_sections.edit', $section->id) }}" class="btn btn-primary btn-sm">
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
                            <label class="text-muted small">Section Title</label>
                            <h5 class="fw-bold">
                                {{ $section->title }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-left-info h-100">
                        <div class="card-body">
                            <label class="text-muted small">Subtitle</label>
                            <h5 class="fw-bold">
                                {{ $section->subtitle ?? 'N/A' }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
