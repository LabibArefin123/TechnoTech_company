<section id="projects" class="techno-projects py-5">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_project.css') }}">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="projects-title">Latest Projects</h2>
            <p class="projects-subtitle">Recently Completed Works</p>
        </div>

        <div class="projects-slider">

            @foreach ($projects->chunk(3) as $key => $chunk)
                <div class="projects-slide {{ $key == 0 ? 'active' : '' }}">
                    <div class="row g-4">

                        @foreach ($chunk as $project)
                            <div class="col-lg-4 col-md-6">
                                <div class="project-card">

                                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">

                                    <div class="project-info">
                                        <h5>{{ $project->title }}</h5>
                                        <span>{{ $project->category }}</span>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach

        </div>

        <div class="projects-dots">
            @foreach ($projects->chunk(3) as $key => $chunk)
                <span class="dot {{ $key == 0 ? 'active' : '' }}" onclick="showProjectSlide({{ $key }})"></span>
            @endforeach
        </div>

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

</section>
