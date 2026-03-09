@extends('adminlte::page')

@section('title', 'Edit Contact Card')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Edit Contact Card</h3>
        <a href="{{ route('contact_cards.index') }}" class="btn btn-secondary btn-sm">
            Back
        </a>
    </div>
@stop


@section('content')
    <div class="card shadow">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">

            <form action="{{ route('contact_cards.update', $card->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-6">

                        <label>Title</label>

                        <input type="text" name="title" value="{{ $card->title }}" class="form-control">

                    </div>


                    <div class="col-md-6">

                        <label>Type</label>

                        <select name="type" class="form-control">

                            <option value="email" {{ $card->type == 'email' ? 'selected' : '' }}>
                                Email
                            </option>

                            <option value="phone" {{ $card->type == 'phone' ? 'selected' : '' }}>
                                Phone
                            </option>

                            <option value="address" {{ $card->type == 'address' ? 'selected' : '' }}>
                                Address
                            </option>

                        </select>

                    </div>


                    <div class="col-md-6">

                        <label>Value</label>

                        <input type="text" name="value" value="{{ $card->value }}" class="form-control">

                    </div>


                    <div class="col-md-6">

                        <label>Status</label>

                        <select name="status" class="form-control">

                            <option value="1" {{ $card->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ $card->status == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>


                <div class="row mt-2">

                    <div class="col-md-6">

                        <label>Image</label>

                        <div class="input-group">

                            <input type="text" name="image" id="image_path" value="{{ $card->image }}"
                                class="form-control" readonly>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#imageUploadModal">

                                Upload

                            </button>

                        </div>

                    </div>

                </div>


                <div class="text-end mt-4">

                    <button class="btn btn-success">
                        Update Contact Card
                    </button>

                </div>


            </form>

        </div>
    </div>

    @include('backend.contact_cards.partials.image_modal')

@stop


@push('js')
    <script src="{{ asset('js/backend/contact_cards/partials/image_script.js') }}"></script>
@endpush
