@extends('adminlte::page')

@section('title', 'Techno-Tech Dashboard')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4 fw-bold text-success">
            Welcome to Techno-Tech Engineering Ltd Admin Panel
        </h3>
        <div class="row g-4">
            <!-- TOTAL ACTIVE PROJECTS -->
            <div class="col-md-3 col-6">
                <a href="{{ route('project_sections.index') }}" class="text-decoration-none">
                    <div class="card dashboard-card bg-success text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-building fs-1 mb-2"></i>
                            <h4>{{ $totalActiveProject }}</h4>
                            <p class="mb-0">Total Active Projects</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <style>
        .dashboard-card {
            border-radius: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .dashboard-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            opacity: 0.95;
        }
    </style>

@stop
