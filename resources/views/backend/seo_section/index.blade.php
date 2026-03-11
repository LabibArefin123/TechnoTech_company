@extends('adminlte::page')

@section('title', 'SEO Settings')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('seo.update') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control">
{{ $seo->meta_description ?? '' }}
</textarea>
                </div>

                <div class="form-group">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $seo->meta_keywords ?? '' }}">
                </div>

                <button class="btn btn-success mt-3">
                    Update SEO
                </button>

            </form>

        </div>
    </div>

@endsection
