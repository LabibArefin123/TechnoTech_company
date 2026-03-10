@extends('adminlte::page')

@section('title', 'View About Section')

@section('content_header')
    <h3>About Section Details</h3>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <!-- Title -->
            <h3 class="mb-2">{{ $about->title }}</h3>

            <!-- Tagline -->
            <p class="text-muted mb-4">
                {{ $about->tagline }}
            </p>

            <hr>

            <!-- Paragraphs -->
            <h5 class="mb-3">Description</h5>

            <p>{!! $about->paragraph_1 !!}</p>

            @if ($about->paragraph_2)
                <p>{!! $about->paragraph_2 !!}</p>
            @endif

            @if ($about->paragraph_3)
                <p>{!! $about->paragraph_3 !!}</p>
            @endif


            <hr class="my-4">

            <!-- Mission & Vision -->
            <div class="row">

                <div class="col-md-6">

                    <div class="border rounded p-3 h-100">

                        <h5 class="text-primary">
                            {{ $about->mission_title }}
                        </h5>

                        <p class="mb-0">
                            {{ $about->mission_text }}
                        </p>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded p-3 h-100">

                        <h5 class="text-success">
                            {{ $about->vision_title }}
                        </h5>

                        <p class="mb-0">
                            {{ $about->vision_text }}
                        </p>

                    </div>

                </div>

            </div>


            <hr class="my-4">

            <!-- Images -->
            <h5 class="mb-3">Images</h5>

            <div class="row">

                <div class="col-md-6 text-center">

                    <img src="{{ asset($about->image_1) }}" class="img-fluid rounded shadow-sm" style="max-height:250px">

                </div>

                <div class="col-md-6 text-center">

                    <img src="{{ asset($about->image_2) }}" class="img-fluid rounded shadow-sm" style="max-height:250px">

                </div>

            </div>

        </div>
    </div>

@stop
