<section id="projects" class="techno-projects py-5">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_project.css') }}">

    <div class="container">

        {{-- Section Header --}}
        <div class="text-center mb-5">
            <h2 class="projects-title">Latest Projects</h2>
            <p class="projects-subtitle">Recently Completed Works</p>
        </div>

        {{-- Slider Wrapper --}}
        <div class="projects-slider">

            {{-- Slide 1 --}}
            <div class="projects-slide active">
                <div class="row g-4">

                    <div class="col-lg-4 col-md-6">
                        <div class="project-card">
                            <img src="{{ asset('uploads/images/welcome_page/projects/image_1_factory-consulting.JPG') }}"
                                alt="Factory Consulting">
                            <div class="project-info">
                                <h5>Factory Consulting</h5>
                                <span>Building, Renovation</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="project-card">
                            <img src="{{ asset('uploads/images/welcome_page/projects/image_2_building-construction.JPG') }}"
                                alt="Building Construction">
                            <div class="project-info">
                                <h5>Building Construction</h5>
                                <span>Building</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="project-card">
                            <img src="{{ asset('uploads/images/welcome_page/projects/image_3_factory_building.JPG') }}"
                                alt="Factory Building Design">
                            <div class="project-info">
                                <h5>Factory Building Design</h5>
                                <span>Building</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="projects-slide">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card">
                            <img src="{{ asset('uploads/images/welcome_page/projects/image_4_oil_mill.JPG') }}"
                                alt="Oil Mill Construction">
                            <div class="project-info">
                                <h5>Oil Mill Construction</h5>
                                <span>Building, Renovation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Pagination Dots --}}
        <div class="projects-dots">
            <span class="dot active" onclick="showProjectSlide(0)"></span>
            <span class="dot" onclick="showProjectSlide(1)"></span>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                const projectSlides = document.querySelectorAll('.projects-slide');
                const dots = document.querySelectorAll('.projects-dots .dot');

                function showProjectSlide(index) {
                    projectSlides.forEach(slide => slide.classList.remove('active'));
                    dots.forEach(dot => dot.classList.remove('active'));

                    projectSlides[index].classList.add('active');
                    dots[index].classList.add('active');
                }

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        showProjectSlide(index);
                    });
                });

            });
        </script>
    </div>
</section>
