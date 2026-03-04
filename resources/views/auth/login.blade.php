@extends('frontend.layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="login-glass" id="sliderContainer">

            {{-- LEFT : ABOUT --}}
            <div class="about-slider">
                {{-- Logo Placeholder --}}
                <div class="company-logo-placeholder mb-4">
                    {{-- Add your logo later --}}
                </div>

                {{-- SHORT ABOUT --}}
                <div class="about-content short" id="aboutShort">
                    <h4 class="fw-bold mb-3">About TechnoTech Engineering Ltd</h4>
                    <p>
                        TechnoTech Engineering Ltd, established in 1995, began as a mechanical construction firm
                        formed by highly qualified engineers. We successfully complete sophisticated projects
                        across gas pipelines, power plants, oil refineries, and industrial sectors.
                    </p>

                    <button class="btn btn-outline-primary rounded-pill mt-3" onclick="toggleAbout(true)">
                        More Information
                    </button>
                </div>

                {{-- FULL ABOUT --}}
                <div class="about-content full" id="aboutFull" style="display:none;">
                    <h4 class="fw-bold mb-3">Our Legacy & Expertise</h4>
                    <p>
                        TechnoTech Engineering Ltd has vast experience in boilers, turbines, generators, civil,
                        mechanical, and electrical works, as well as refractory and insulation services. We collaborate
                        with local and international professionals to deliver specialized expertise in every project.
                    </p>

                    <h5 class="mt-3">Our Services</h5>
                    <ul class="ps-3">
                        <li>Boilers, Turbines, Generators, Furnaces & Heavy Equipment</li>
                        <li>Civil, Mechanical & Electrical Erection and Installation</li>
                        <li>Steel Storage Tanks, Chimneys, Refractory & Insulation Works</li>
                        <li>Construction Management & Equipment Handling</li>
                        <li>Design, Installation & Commissioning of Industrial Plants</li>
                    </ul>

                    <h5 class="mt-3">Key Activities</h5>
                    <ul class="ps-3">
                        <li>Power Plant Erection & Commissioning</li>
                        <li>Industrial Equipment Installation & Revamping</li>
                        <li>Pipeline, Cooling Tower & Fuel System Design & Installation</li>
                        <li>Construction Management & Logistics</li>
                    </ul>

                    <button class="btn btn-outline-primary rounded-pill mt-3" onclick="toggleAbout(false)">
                        Show Less
                    </button>
                </div>
            </div>

            {{-- RIGHT : LOGIN --}}
            <div class="login-panel">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">Secure Login</h4>
                    <p class="text-muted">TechnoTech Engineering Ltd</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email or Username</label>
                        <input type="text" name="login" class="form-control form-control-lg"
                            placeholder="Enter email or username">
                    </div>

                    <div class="mb-4">
                        <input id="password" type="password"
                            class="form-control form-control-lg rounded-3 shadow-sm @error('password') is-invalid @enderror"
                            name="password" placeholder="Enter your password" required>

                        @error('password')
                            <div class="invalid-feedback d-block mt-1"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button class="btn login-btn w-100 py-2 rounded-pill mt-3">
                        Login
                    </button>

                    <div class="text-center mt-3">
                        <a href="{{ route('password.request') }}" id="forgotPasswordLink" class="text-decoration-none">
                            Forgot Password?
                        </a>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <a href="javascript:void(0)" onclick="openProblemModal()" class="text-decoration-none fw-semibold">
                            ⚠ Facing a system problem?
                        </a>
                        <p class="text-muted small mt-1">
                            Let us know — our technical team will take care of it.
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>

    {{-- SYSTEM PROBLEM MODAL --}}
    <div id="problemModal" class="problem-modal">
        <div class="problem-modal-content">
            <div class="modal-header">
                <h5 class="fw-bold mb-0">Report a System Problem</h5>
                <button type="button" class="close-btn" onclick="closeProblemModal()">×</button>
            </div>

            <form method="POST" action="{{ route('system_problem.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Hidden Problem ID -->
                <input type="hidden" name="problem_id" value="Auto Generated">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Problem Title</label>
                    <input type="text" name="problem_title" class="form-control" placeholder="Example: Login not working"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Describe the Problem</label>
                    <textarea name="problem_description" class="form-control" rows="4" placeholder="Please explain what happened..."
                        required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Priority Level</label>
                    <select name="status" class="form-control" required>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="critical">Critical</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Attachment (Optional)</label>
                    <input type="file" name="problem_file" class="form-control" accept="image/*,.pdf">
                </div>

                <button class="btn btn-primary w-100 rounded-pill">
                    Submit Problem
                </button>
            </form>
        </div>
    </div>

    {{-- STYLES --}}
    <style>
        body {
            background: url('{{ asset('uploads/images/login_page/background.jpg') }}') center/cover no-repeat;
        }

        .about-content.full {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/backend/custom_login.css') }}">

    {{-- SCRIPTS --}}
    <script>
        function toggleAbout(showFull) {
            const shortAbout = document.getElementById('aboutShort');
            const fullAbout = document.getElementById('aboutFull');
            if (showFull) {
                shortAbout.style.display = 'none';
                fullAbout.style.display = 'block';
            } else {
                fullAbout.style.display = 'none';
                shortAbout.style.display = 'block';
            }
        }

        function openProblemModal() {
            document.getElementById('problemModal').classList.add('show');
        }

        function closeProblemModal() {
            document.getElementById('problemModal').classList.remove('show');
        }

        // Close modal when clicking outside
        document.getElementById('problemModal').addEventListener('click', function(e) {
            if (e.target === this) closeProblemModal();
        });
    </script>
@endsection
