@extends('adminlte::page')

@section('title', 'View Quote Request')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h1 class="mb-0">Quote Request Details</h1>

        <a href="{{ route('quote_requests.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop

@section('content')

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row">

                {{-- Quote ID --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">Quote ID</label>
                    <input type="text" class="form-control" value="{{ $quote->id }}" readonly>
                </div>

                {{-- Name --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">Full Name</label>
                    <input type="text" class="form-control" value="{{ $quote->name }}" readonly>
                </div>

                {{-- Phone --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">Phone</label>
                    <input type="text" class="form-control" value="{{ $quote->phone }}" readonly>
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">Email</label>
                    <input type="text" class="form-control" value="{{ $quote->email ?? 'N/A' }}" readonly>
                </div>

                {{-- Project Type --}}
                <div class="col-md-12 mb-3">
                    <label class="fw-semibold">Project Type</label>
                    <input type="text" class="form-control" value="{{ $quote->project_type ?? 'N/A' }}" readonly>
                </div>

                {{-- Message --}}
                <div class="col-md-12 mb-3">
                    <label class="fw-semibold">Project Details</label>
                    <textarea class="form-control" rows="5" readonly>{{ $quote->message }}</textarea>
                </div>

                {{-- Requested At --}}
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">Requested At</label>
                    <input type="text" class="form-control" value="{{ $quote->created_at->format('d M Y, h:i A') }}"
                        readonly>
                </div>

            </div>

        </div>
    </div>

@stop
