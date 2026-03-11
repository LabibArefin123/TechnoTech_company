<section id="about" class="about-style-3 py-5">

    <link rel="stylesheet" href="{{ asset('css/frontend/custom_about_3.css') }}">

    <div class="container text-center">
        <h2 class="about3-title">
            {{ $about->title }}
        </h2>
        <p class="about3-tagline">
            {{ $about->tagline }}
        </p>
        <div class="row align-items-center mt-5">
            <div class="col-md-4">
                <div class="about3-box">
                    <h5>{{ $about->mission_title }}</h5>
                    <p>
                        {{ $about->mission_text }}
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about3-image">
                    <img src="{{ asset($about->image_1) }}" alt="About">
                </div>
            </div>
            <div class="col-md-4">
                <div class="about3-box">
                    <h5>{{ $about->vision_title }}</h5>
                    <p>
                        {{ $about->vision_text }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8 mx-auto">
                <p class="about3-text">
                    {!! $about->paragraph_1 !!}
                </p>

                <p class="about3-text">
                    {!! $about->paragraph_2 !!}
                </p>

                <p class="about3-text">
                    {!! $about->paragraph_3 !!}
                </p>
            </div>
        </div>
    </div>
</section>
