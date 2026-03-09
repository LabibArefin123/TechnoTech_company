@extends('adminlte::page')

@section('title', 'View Contact Card')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Contact Card Details</h3>
        <div>
            <a href="{{ route('contact_cards.edit', $card->id) }}" class="btn btn-primary btn-sm">
                Edit
            </a>

            <a href="{{ route('contact_cards.index') }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>
    </div>
@stop


@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label><strong>Title</strong></label>

                    <input type="text" class="form-control" value="{{ $card->title }}" readonly>

                </div>


                <div class="col-md-6 mb-3">

                    <label><strong>Type</strong></label>

                    <input type="text" class="form-control" value="{{ ucfirst($card->type) }}" readonly>

                </div>


                <div class="col-md-6 mb-3">

                    <label><strong>Value</strong></label>

                    <input type="text" class="form-control" value="{{ $card->value }}" readonly>

                </div>


                <div class="col-md-6 mb-3">

                    <label><strong>Status</strong></label>

                    <input type="text" class="form-control" value="{{ $card->status ? 'Active' : 'Inactive' }}" readonly>
                </div>
            </div>


            <div class="row mt-2">

                <div class="col-md-6">

                    <label><strong>Image</strong></label>

                    <div class="border p-2 text-center">

                        @if ($card->image)
                            <img src="{{ asset($card->image) }}" style="max-height:150px">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif

                    </div>

                </div>

            </div>


        </div>

    </div>

@stop
