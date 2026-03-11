<section id="about" class="about-style-2 py-5">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_about_2.css') }}">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="about2-image">
                    <img src="{{ asset($about->image_1) }}" alt="About">

                    <div class="about2-overlay">
                        <img src="{{ asset($about->image_2) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <h2 class="about2-title">
                    {{ $about->title }}
                </h2>

                <p class="about2-tagline">
                    {{ $about->tagline }}
                </p>

                <p class="about2-text">
                    {!! $about->paragraph_1 !!}
                </p>

                <p class="about2-text">
                    {!! $about->paragraph_2 !!}
                </p>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="about2-card">
                            <h5>{{ $about->mission_title }}</h5>
                            <p>
                                {{ $about->mission_text }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about2-card">
                            <h5>{{ $about->vision_title }}</h5>
                            <p>
                                {{ $about->vision_text }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
