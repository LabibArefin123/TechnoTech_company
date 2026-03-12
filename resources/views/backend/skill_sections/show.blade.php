@extends('adminlte::page')

@section('title', 'Skill Details')

@section('content_header')
    <h3>Skill Details</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label>Skill Name</label>
                    <input type="text" class="form-control" value="{{ $skill->name }}" readonly>
                </div>

                <div class="col-md-6">
                    <label>Percent</label>
                    <input type="text" class="form-control" value="{{ $skill->percent }}%" readonly>
                </div>

                <div class="col-md-6">
                    <label>Serial</label>
                    <input type="text" class="form-control" value="{{ $skill->serial }}" readonly>
                </div>

                <div class="col-md-6">
                    <label>Status</label>
                    <input type="text" class="form-control" value="{{ $skill->status ? 'Active' : 'Inactive' }}"
                        readonly>
                </div>
            </div>
        </div>
    </div>
@stop
