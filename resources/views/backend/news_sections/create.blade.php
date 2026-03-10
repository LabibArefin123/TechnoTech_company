@extends('adminlte::page')

@section('title', 'Add News Section')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Add News Section</h3>

        <a href="{{ route('news_sections.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('news_sections.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Section Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Latest Updates">
                    </div>

                    <div class="col-md-6">

                        <label>Subtitle</label>

                        <input type="text" name="subtitle" class="form-control" placeholder="Articles & project updates">

                    </div>

                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i> Save Section
                    </button>
                </div>

            </form>

        </div>

    </div>

@stop
