@extends('adminlte::page')

@section('title', 'View About Section')

@section('content_header')
    <h3>About Section Details</h3>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <h4>{{ $about->title }}</h4>

            <p>{{ $about->tagline }}</p>

            <p>{{ $about->paragraph_1 }}</p>

            <div class="row mt-3">

                <div class="col-md-6">
                    <img src="{{ asset($about->image_1) }}" class="img-fluid">
                </div>

                <div class="col-md-6">
                    <img src="{{ asset($about->image_2) }}" class="img-fluid">
                </div>

            </div>

        </div>
    </div>

@stop
