@extends('adminlte::page')

@section('title', 'SEO Settings')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="seo-card-wrapper">

                    {{-- VIEW CARD --}}
                    <div class="card shadow-sm seo-card" id="seoViewCard">

                        <div class="card-header">

                            <h5 class="mb-0">
                                <i class="fas fa-search me-2"></i>
                                Current SEO Information
                            </h5>

                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="fw-semibold">Meta Title</label>
                                <p class="text-muted mb-0">
                                    {{ $seo->meta_title ?? 'Not Set' }}
                                </p>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="fw-semibold">Meta Description</label>
                                <p class="text-muted mb-0">
                                    {{ $seo->meta_description ?? 'Not Set' }}
                                </p>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="fw-semibold">Meta Keywords</label>
                                <p class="text-muted mb-0">
                                    {{ $seo->meta_keywords ?? 'Not Set' }}
                                </p>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-warning" id="editSeoBtn">
                                    <i class="fas fa-edit me-1"></i>
                                    Edit SEO
                                </button>
                            </div>
                        </div>
                    </div>


                    {{-- EDIT CARD --}}
                    <div class="card shadow-sm seo-card d-none" id="seoEditCard">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-pen me-2"></i>
                                Update SEO Settings
                            </h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('seo.update') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $seo->meta_title ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3">{{ $seo->meta_description ?? '' }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control"
                                        value="{{ $seo->meta_keywords ?? '' }}">
                                </div>

                                <div class="mt-4">

                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-1"></i>
                                        Update SEO
                                    </button>

                                    <button type="button" class="btn btn-secondary ms-2" id="cancelEditBtn">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <style>
        .seo-card-wrapper {
            position: relative;
        }

        .seo-card {
            transition: all .35s ease;
        }

        .seo-card.fade-out {
            opacity: 0;
            transform: scale(.95);
        }

        .seo-card.fade-in {
            opacity: 1;
            transform: scale(1);
        }
    </style>
@endsection

@section('js')

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const viewCard = document.getElementById('seoViewCard');
            const editCard = document.getElementById('seoEditCard');

            const editBtn = document.getElementById('editSeoBtn');
            const cancelBtn = document.getElementById('cancelEditBtn');

            editBtn.addEventListener('click', function() {

                viewCard.classList.add('fade-out');

                setTimeout(function() {

                    viewCard.classList.add('d-none');
                    viewCard.classList.remove('fade-out');

                    editCard.classList.remove('d-none');
                    editCard.classList.add('fade-in');

                }, 250);

            });


            cancelBtn.addEventListener('click', function() {

                editCard.classList.add('fade-out');

                setTimeout(function() {

                    editCard.classList.add('d-none');
                    editCard.classList.remove('fade-out');

                    viewCard.classList.remove('d-none');
                    viewCard.classList.add('fade-in');

                }, 250);

            });

        });
    </script>

@endsection
