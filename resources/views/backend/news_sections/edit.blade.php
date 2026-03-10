@extends('adminlte::page')

@section('title', 'Edit News Section')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Edit News Section</h3>

        <a href="{{ route('news_sections.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('news_sections.update', $section->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <label>Section Title</label>
                        <input type="text" name="title" value="{{ $section->title }}" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Subtitle</label>
                        <input type="text" name="subtitle" value="{{ $section->subtitle }}" class="form-control">
                    </div>
                </div>


                <div class="text-end mt-3">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Section
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
