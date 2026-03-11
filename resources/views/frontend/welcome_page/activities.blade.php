<section id="activities" class="techno-activities py-5">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_activity.css') }}">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="activities-title">Our Key Activities</h2>
            <p class="activities-subtitle">
                Specialized engineering and construction activities delivered with
                precision, safety, and technical excellence.
            </p>
        </div>

        <div class="row g-4">
            @foreach ($activities as $activity)
                <div class="col-lg-4 col-md-6">
                    <div class="activity-box h-100">
                        <div class="activity-image">
                            <img src="{{ asset('uploads/images/welcome_page/key_activities/' . $activity->image) }}">
                        </div>
                        <i class="bi {{ $activity->icon }}"></i>
                        <h5>{{ $activity->title }}</h5>
                        <p>{{ $activity->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
