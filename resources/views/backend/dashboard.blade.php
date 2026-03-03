@extends('adminlte::page')

@section('title', 'Techno-Tech Dashboard')

@section('content')

    <div class="container py-4">

        <h3 class="mb-4 fw-bold text-success">
            Welcome to Techno-Tech Engineering Ltd Admin Panel
        </h3>

        <div class="row g-4">

            <!-- EMPLOYEES / ENGINEERS -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-primary text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-person-badge fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Total Employees</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- PROJECTS -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-success text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-building fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Active Projects</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- EQUIPMENT / MACHINERY -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-warning text-dark text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-tools fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Total Equipment</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- REPORTS / DOCUMENTS -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-danger text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-file-earmark-text fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Reports Generated</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <!-- SECOND ROW: TRANSPORT & INSTALLATIONS -->
        <div class="row g-4 mt-4">

            <!-- TRANSPORT / LOGISTICS -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-info text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-truck fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Logistics Entries</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- INSTALLATIONS / ERECTIONS -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-secondary text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-tools fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Installations</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- CLIENTS -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-success text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-briefcase fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Clients</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- CONTRACTS / AGREEMENTS -->
            <div class="col-md-3 col-6">
                <a href="#" class="text-decoration-none">
                    <div class="card dashboard-card bg-primary text-white text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-file-earmark-check fs-1 mb-2"></i>
                            <h4>00</h4>
                            <p class="mb-0">Contracts</p>
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
