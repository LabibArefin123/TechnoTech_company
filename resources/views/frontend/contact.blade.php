@extends('frontend.layouts.app')

@section('title', 'Contact Us | TechnoTech Engineering Ltd.')

@section('content')
    @include('frontend.welcome_page.header')
    <section id="contact" class="techno-contact py-5">
        <div class="container">

            {{-- Section Header --}}
            <div class="text-center mb-5">
                <h2 class="contact-title">Get In Touch</h2>
                <p class="contact-subtitle">
                    Needs Help? Let’s Get in Touch
                </p>
            </div>

            <div class="row g-4 align-items-start">

                {{-- Contact Info --}}
                <div class="col-lg-4">
                    <div class="contact-card p-4 shadow-sm rounded-4">
                        <h5 class="fw-bold mb-3">Make A Quote</h5>
                        <p><i class="bi bi-envelope-fill me-2 text-success"></i> info@elevate.com</p>

                        <h5 class="fw-bold mt-4 mb-3">Call Us 24/7</h5>
                        <p><i class="bi bi-telephone-fill me-2 text-success"></i> +584 (25) 21453</p>

                        <h5 class="fw-bold mt-4 mb-3">Work Station</h5>
                        <p><i class="bi bi-geo-alt-fill me-2 text-success"></i> 25 Hilton Street, Aus.</p>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="col-lg-8">
                    <div class="contact-card p-4 shadow-sm rounded-4 bg-white">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="row g-3">

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

                                <div class="col-12">
                                    <textarea name="message" rows="5" class="form-control" placeholder="Comments" required></textarea>
                                </div>

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success px-4 py-2">
                                        Send Message
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
    @include('frontend.welcome_page.footer')
    <style>
        .techno-contact {
            background: #f8fafc;
        }

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

        .contact-card {
            background: #f1f5f9;
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
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
    </style>
@endsection
