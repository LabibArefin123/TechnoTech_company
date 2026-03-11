<section id="about" class="techno-about py-5">

    <link rel="stylesheet" href="{{ asset('css/frontend/custom_about.css') }}">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="about-title">{{ $about->title }}</h2>

            <p class="about-tagline">
                {{ $about->tagline }}
            </p>
        </div>

        <div class="row align-items-center">

            <div class="col-lg-6 mb-4 mb-lg-0">

                <p class="about-text">
                    {!! $about->paragraph_1 !!}
                </p>

                <p class="about-text">
                    {!! $about->paragraph_2 !!}
                </p>

                <p class="about-text">
                    {!! $about->paragraph_3 !!}
                </p>

                <div class="row mt-4">

                    <div class="col-md-6">
                        <h5 class="about-heading">{{ $about->mission_title }}</h5>

                        <p class="about-small-text">
                            {{ $about->mission_text }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="about-heading">{{ $about->vision_title }}</h5>

                        <p class="about-small-text">
                            {{ $about->vision_text }}
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-lg-6 position-relative about-image-wrapper">

                <div class="image-card image-card-1">
                    <img src="{{ asset($about->image_1) }}" alt="About Image">
                </div>

                <div class="image-card image-card-2">
                    <img src="{{ asset($about->image_2) }}" alt="About Image">
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
