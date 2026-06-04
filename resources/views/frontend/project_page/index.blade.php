@extends('frontend.layouts.app')

@section('content')
    @include('frontend.welcome_page.header')
    <link rel="stylesheet" href="{{ asset('css/frontend/project_page/project-page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/project_page/project-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/project_page/project-filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/project_page/project-responsive.css') }}">

    <section class="project-page py-5">

        <div class="container">

            <div class="text-center mb-5">
                <h1 class="page-title">Our Projects</h1>
                <p class="page-subtitle">
                    Explore Our Latest Completed Projects
                </p>
            </div>

            <div class="row">

                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="project-box">

                            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">

                            <div class="project-content">

                                <span class="category">
                                    {{ $project->category }}
                                </span>

                                <h4>
                                    {{ $project->title }}
                                </h4>

                                <a href="{{ route('project.show', $project->id) }}" class="project-view-btn">

                                    <i class="fas fa-arrow-right me-2"></i>

                                    View Project

                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $projects->links() }}
            </div>

        </div>

    </section>
    @include('frontend.welcome_page.footer')
@endsection
