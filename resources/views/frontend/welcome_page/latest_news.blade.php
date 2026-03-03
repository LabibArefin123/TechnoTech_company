<section id="news" class="techno-news py-5">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_news.css') }}">

    <div class="container">

        {{-- Section Header --}}
        <div class="text-center mb-5">
            <h2 class="news-title">Latest Updates</h2>
            <p class="news-subtitle">
                Articles & project updates with useful information
            </p>
        </div>

        <div class="row g-4 align-items-stretch">

            {{-- FEATURED VIDEO NEWS --}}
            <div class="col-lg-6">
                <div class="news-video-card">

                    <div class="news-video-frame">
                        <iframe
                            src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/reel/4372354089701572&show_text=false&width=560"
                            width="100%" height="360" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                        </iframe>
                    </div>

                    <div class="news-video-info">
                        <span class="news-category">Project Update</span>
                        <h4>Hydraulic Testing & Chemical Cleaning of HRSG Boiler</h4>
                        <p>
                            Successful execution of hydraulic testing and chemical
                            cleaning works for HRSG boiler ensuring safety, efficiency,
                            and compliance with international standards.
                        </p>
                    </div>

                </div>
            </div>

            {{-- RIGHT SIDE NEWS --}}
            <div class="col-lg-6">
                <div class="news-list">

                    <div class="news-item">
                        <span class="news-category">Construction</span>
                        <span class="news-date">April 3, 2023</span>

                        <h5>
                            One of the World’s Largest Passive House Buildings Construction
                        </h5>

                        <div class="news-meta">
                            <span>TechnoTech Engineering Ltd</span>
                            <a href="#" class="read-more">Read More →</a>
                        </div>
                    </div>

                    <div class="news-item">
                        <span class="news-category">Engineering</span>
                        <span class="news-date">May 18, 2023</span>

                        <h5>
                            Boiler Erection & Commissioning Completed at Industrial Plant
                        </h5>

                        <div class="news-meta">
                            <span>Project Team</span>
                            <a href="#" class="read-more">Read More →</a>
                        </div>
                    </div>

                    <div class="news-item">
                        <span class="news-category">Logistics</span>
                        <span class="news-date">June 2, 2023</span>

                        <h5>
                            Heavy Equipment Transportation Successfully Delivered On Site
                        </h5>

                        <div class="news-meta">
                            <span>Operations</span>
                            <a href="#" class="read-more">Read More →</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
