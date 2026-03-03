<section id="about" class="techno-about py-5">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_about.css') }}">

    <div class="container">

        {{-- Section Header --}}
        <div class="text-center mb-5">
            <h2 class="about-title">About TechnoTech Engineering Ltd</h2>

            <p class="about-tagline">
                Engineering Excellence • Industrial Expertise • Trusted Since 1995
            </p>
        </div>

        <div class="row align-items-center">

            {{-- LEFT CONTENT --}}
            <div class="col-lg-6 mb-4 mb-lg-0">

                <p class="about-text">
                    <strong>TechnoTech Engineering Ltd</strong> was established in 1995 by a group of
                    highly qualified engineers from diverse disciplines. What began as a mechanical
                    construction firm has grown into a trusted name in Bangladesh’s energy and
                    industrial sectors.
                </p>

                <p class="about-text">
                    Over the years, we have successfully executed complex projects in gas pipelines,
                    power plants, oil refineries, and large-scale industrial facilities. Some projects
                    were delivered independently, while others were completed in collaboration with
                    reputable local and international partners.
                </p>

                <p class="about-text">
                    As a certified industrial boiler license holder, we specialize in fabrication,
                    installation, refractory & insulation works, welding, heavy equipment handling,
                    and construction management. Our commitment is simple — deliver quality work,
                    on time, with professionalism and technical excellence.
                </p>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h5 class="about-heading">Our Mission</h5>
                        <p class="about-small-text">
                            To provide reliable, high-quality engineering solutions through
                            innovation, safety, and technical expertise.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="about-heading">Our Vision</h5>
                        <p class="about-small-text">
                            To be a leading engineering and construction partner in Bangladesh
                            and beyond, recognized for integrity and excellence.
                        </p>
                    </div>
                </div>

            </div>

            {{-- RIGHT SIDE IMAGES --}}
            <div class="col-lg-6 position-relative about-image-wrapper">

                <div class="image-card image-card-1">
                    <img src="{{ asset('uploads/images/welcome_page/about/about_1.jpg') }}" alt="Project Image">
                </div>

                <div class="image-card image-card-2">
                    <img src="{{ asset('uploads/images/welcome_page/about/about_2.jpg') }}" alt="Project Image">
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const img1 = document.querySelector(".image-card-1");
            const img2 = document.querySelector(".image-card-2");

            function swapImages() {
                img1.classList.toggle("swapped");
                img2.classList.toggle("swapped");
            }

            img1.addEventListener("click", swapImages);
            img2.addEventListener("click", swapImages);

        });
    </script>
</section>
