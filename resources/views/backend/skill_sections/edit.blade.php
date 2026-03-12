@extends('adminlte::page')

@section('title', 'Edit Skill')

@section('content_header')
    <h3>Edit Skill</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('skill_sections.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Skill Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $skill->name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Percent</label>
                        <input type="number" name="percent" class="form-control" value="{{ $skill->percent }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Serial</label>
                        <input type="number" name="serial" class="form-control" value="{{ $skill->serial }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $skill->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$skill->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-success">Update</button>

            </form>

        </div>
    </div>

@stop
