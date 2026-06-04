@extends('frontend.layouts.app')

@section('title', $project->title . ' | Projects')

@section('content')

    @include('frontend.welcome_page.header')

    <link rel="stylesheet" href="{{ asset('css/frontend/custom_sub_project.css') }}">

    <section class="sub-project-section">

        <div class="container">

            {{-- HERO --}}
            <div class="sub-project-hero">

                <div class="sub-project-banner">

                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">

                </div>

                <div class="sub-project-info">

                    <span class="sub-project-category">

                        {{ $project->category }}

                    </span>

                    <h1 class="sub-project-title">

                        {{ $project->title }}

                    </h1>

                </div>

            </div>

            {{-- GALLERY --}}
            <div class="sub-project-gallery-wrapper">

                <div class="sub-project-heading">

                    <h2>

                        Project Gallery

                    </h2>

                    <p>

                        Explore completed works and project highlights.

                    </p>

                </div>

                <div class="row g-4">

                    @forelse($project->subProjects as $sub)
                        <div class="col-lg-4 col-md-6">

                            <div class="sub-project-gallery-card">

                                <div class="sub-project-image-wrapper">

                                    <img src="{{ asset($sub->image) }}" class="sub-project-gallery-image galleryZoom"
                                        data-image="{{ asset($sub->image) }}" alt="{{ $sub->title }}">

                                </div>

                                <div class="sub-project-card-body">

                                    <h5>

                                        {{ $sub->title ?: 'Project Image' }}

                                    </h5>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="sub-project-empty">

                                No gallery images available.

                            </div>

                        </div>
                    @endforelse

                </div>

            </div>

        </div>
        <script src="{{ asset('js/backend/page/image-zoom.js') }}"></script>
    </section>
    @include('frontend.welcome_page.footer')

@endsection
