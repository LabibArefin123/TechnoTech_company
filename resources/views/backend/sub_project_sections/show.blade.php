@extends('adminlte::page')

@section('title', 'View Sub Project')

@section('content_header')
    <h4>👁️ Sub Project Details</h4>
@stop

@section('content')

    <style>
        .gallery-image {

            width: 100%;
            height: 220px;

            object-fit: contain;

            cursor: pointer;

            transition: .3s;

            border-radius: 10px 10px 0 0;

        }

        .gallery-image:hover {

            transform: scale(1.03);

        }

        .card {

            overflow: hidden;

            border-radius: 12px;

        }
    </style>

    <div class="card shadow">

        <div class="card-header">

            <h4>

                📂 Project Gallery Details

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                {{-- Project --}}
                <div class="col-md-6 mb-4">

                    <label class="fw-bold">

                        Project

                    </label>

                    <div class="form-control bg-light">

                        {{ $item->project->title ?? 'N/A' }}

                    </div>

                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-4">

                    <label class="fw-bold">

                        Status

                    </label>

                    <div class="form-control bg-light">

                        @if ($item->is_active)
                            <span class="badge bg-success">

                                Active

                            </span>
                        @else
                            <span class="badge bg-danger">

                                Hidden

                            </span>
                        @endif

                    </div>

                </div>
                {{-- Gallery --}}
                <div class="col-md-12">

                    <label class="fw-bold mb-3">

                        Gallery Images

                    </label>

                    <div class="row">

                        @foreach ($galleryItems as $gallery)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                                <div class="card shadow-sm border-0 h-100">

                                    <img src="{{ asset($gallery->image) }}" class="gallery-image galleryZoom"
                                        data-image="{{ asset($gallery->image) }}">

                                    <div class="card-body text-center">

                                        <h6 class="mb-0 fw-bold">

                                            {{ $gallery->title ?: 'No Title' }}

                                        </h6>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

            <hr>

            <a href="{{ route('sub_project_sections.edit', $item->id) }}" class="btn btn-primary">

                Edit

            </a>

            <a href="{{ route('sub_project_sections.index') }}" class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>
@stop
