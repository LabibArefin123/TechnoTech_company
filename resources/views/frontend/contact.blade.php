@extends('frontend.layouts.app')

@section('title', 'Contact Us | TechnoTech Engineering Ltd.')

@section('content')
    @include('frontend.welcome_page.header')

    <section id="contact" class="bg-white py-5">
        <div class="container">

            {{-- Section Header --}}
            <div class="text-center mb-5">
                <h2 class="contact-title">Get In Touch</h2>
                <p class="contact-subtitle">
                    Need Help? Let’s Get in Touch
                </p>
            </div>

            <!-- Contact Info Cards Section -->
            <section class="contact-info-cards my-5">
                <div class="row g-4 justify-content-center">

                    <!-- Card 1: Make A Quote -->
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm border-0 p-3 pt-5 position-relative">
                            <!-- Floating Image -->
                            <div class="position-absolute top-0 start-50 translate-middle"
                                style="width:100%; max-width:420px; height:250px;">
                                <img src="{{ asset('uploads/images/welcome_page/contact_page/image_1.webp') }}"
                                    alt="Make a Quote"
                                    style="width:100%; height:100%; object-fit:contain; border-radius: 12px;">
                            </div>
                            <div class="card-body mt-5 pt-5">
                                <h5 class="card-title">Make A Quote</h5>
                                <p class="card-text">
                                    <a href="javascript:void(0);" class="invisible-link" id="emailModalTrigger">
                                        info@technotechengineering.com
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Call Us 24/7 -->
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm border-0 p-3 pt-5 position-relative">
                            <div class="position-absolute top-0 start-50 translate-middle"
                                style="width:100%; max-width:420px; height:250px;">
                                <img src="{{ asset('uploads/images/welcome_page/contact_page/image_2.webp') }}"
                                    alt="Call Us 24/7"
                                    style="width:100%; height:100%; object-fit:contain; border-radius: 12px;">
                            </div>
                            <div class="card-body mt-5 pt-5">
                                <h5 class="card-title">Call Us 24/7</h5>
                                <p class="card-text">
                                    <a href="javascript:void(0);" class="invisible-link" id="callModalTrigger">
                                        (+880) 1754327566
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Work Station -->
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm border-0 p-3 pt-5 position-relative">
                            <div class="position-absolute top-0 start-50 translate-middle"
                                style="width:100%; max-width:420px; height:250px;">
                                <img src="{{ asset('uploads/images/welcome_page/contact_page/image_3.webp') }}"
                                    alt="Work Station"
                                    style="width:100%; height:100%; object-fit:contain; border-radius: 12px;">
                            </div>
                            <div class="card-body mt-5 pt-5">
                                <h5 class="card-title">Work Station</h5>
                                <p class="card-text">
                                    106/A, Green Road (3rd Floor), Farmgate, Corner Place Super Market, Dhaka-1205
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Modals -->
            <!-- Email Modal -->
            <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="emailModalLabel">Send Email</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Email to: <strong>info@technotechengineering.com</strong></p>
                            {{-- You can add a form or action button here --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call Modal -->
            <div class="modal fade" id="callModal" tabindex="-1" aria-labelledby="callModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="callModalLabel">Call Us</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Call: <strong>(+880) 1754327566</strong></p>
                            {{-- You can add call button or further info here --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Custom CSS --}}
            <style>
                .invisible-link {
                    color: #0f172a;
                    text-decoration: none;
                    transition: color 0.3s;
                    cursor: pointer;
                }

                .invisible-link:hover {
                    color: #ff6b6b;
                }
            </style>

            {{-- JS Trigger for Modals --}}
            <script>
                document.getElementById('emailModalTrigger').addEventListener('click', function() {
                    var emailModal = new bootstrap.Modal(document.getElementById('emailModal'));
                    emailModal.show();
                });

                document.getElementById('callModalTrigger').addEventListener('click', function() {
                    var callModal = new bootstrap.Modal(document.getElementById('callModal'));
                    callModal.show();
                });
            </script>
            {{-- Contact Form + Map Section --}}
            <div class="row g-4 align-items-stretch"> {{-- align-items-stretch ensures equal heights --}}
                {{-- Contact Form --}}
                <div class="col-lg-6 d-flex">
                    <div class="contact-card p-4 shadow-sm rounded-4 bg-white flex-fill">
                        <form action="{{ route('contact.send') }}" method="POST" class="h-100 d-flex flex-column">
                            @csrf
                            <div class="row g-3 flex-fill">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email"
                                        required>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject"
                                        required>
                                </div>
                                <div class="col-12 flex-fill">
                                    <textarea name="message" rows="5" class="form-control h-100" placeholder="Comments" required></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4 py-2">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Map --}}
                <div class="col-lg-6 d-flex">
                    <div class="map-card shadow-sm rounded-4 overflow-hidden flex-fill" style="min-height:400px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.805060915486!2d90.39619831543068!3d23.747119794580677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7b3aa1f2e45%3A0x92084f5dc87c5f7f!2sGreen%20Road%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1673952123456!5m2!1sen!2sbd"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

    {{-- Custom CSS --}}
    <style>
        .contact-title {
            font-size: 36px;
            font-weight: 700;
            color: #0f172a;
        }

        .contact-subtitle {
            color: #64748b;
            max-width: 600px;
            margin: auto;
        }

        .contact-info-cards .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .contact-info-cards .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .contact-card {
            background: #f1f5f9;
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .map-card {
            background: #f1f5f9;
            transition: all 0.3s ease;
        }

        .map-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #22c55e;
            box-shadow: 0 0 8px rgba(34, 197, 94, 0.3);
        }

        .btn-success {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.4);
        }

        @media (max-width: 991px) {
            .map-card {
                min-height: 300px;
                margin-top: 20px;
            }
        }
    </style>
@endsection
