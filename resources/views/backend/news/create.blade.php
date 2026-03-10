@extends('adminlte::page')

@section('title', 'Add News')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Add News</h3>
        <a href="{{ route('news.index') }}" class="btn btn-sm btn-secondary back-btn">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Engineering">
                    </div>

                    <div class="col-md-6">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="News Title">
                    </div>


                    <div class="col-md-6 mt-3">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="TechnoTech Engineering Ltd">
                    </div>


                    <div class="col-md-6 mt-3">
                        <label>News Date</label>
                        <input type="date" name="news_date" class="form-control">
                    </div>


                    <div class="col-md-6 mt-3">
                        <label>Type</label>
                        <select name="type" class="form-control">
                            <option value="list">List News</option>
                            <option value="featured">Featured Video</option>
                        </select>
                    </div>


                    <div class="col-md-6 mt-3">
                        <label>Status</label>

                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>


                    <div class="col-md-12 mt-3">
                        <label>Video URL (For Featured News)</label>
                        <input type="text" name="video_url" class="form-control"
                            placeholder="Facebook or YouTube embed URL">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Featured news description"></textarea>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i> Save News
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
