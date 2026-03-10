<section id="news" class="techno-news py-5">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_news.css') }}">

    <div class="container">

        {{-- Section Header --}}
        <div class="text-center mb-5">
            <h2 class="news-title">
                {{ $newsSection->title ?? 'Latest Updates' }}
            </h2>

            <p class="news-subtitle">
                {{ $newsSection->subtitle ?? '' }}
            </p>
        </div>


        <div class="row g-4 align-items-stretch">

            {{-- FEATURED VIDEO NEWS --}}
            <div class="col-lg-6">

                @if ($featuredNews)
                    <div class="news-video-card">

                        <div class="news-video-frame">

                            <iframe src="{{ $featuredNews->video_url }}" width="100%" height="360"
                                style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                            </iframe>

                        </div>

                        <div class="news-video-info">

                            <span class="news-category">
                                {{ $featuredNews->category }}
                            </span>

                            <h4>
                                {{ $featuredNews->title }}
                            </h4>

                            <p>
                                {{ $featuredNews->description }}
                            </p>

                        </div>

                    </div>
                @endif

            </div>


            {{-- RIGHT SIDE NEWS --}}
            <div class="col-lg-6">

                <div class="news-list">

                    @foreach ($listNews as $news)
                        <div class="news-item">

                            <span class="news-category">
                                {{ $news->category }}
                            </span>

                            <span class="news-date">
                                {{ \Carbon\Carbon::parse($news->news_date)->format('F j, Y') }}
                            </span>

                            <h5>
                                {{ $news->title }}
                            </h5>

                            <div class="news-meta">

                                <span>
                                    {{ $news->author }}
                                </span>

                                <a href="#" class="read-more">
                                    Read More →
                                </a>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>
</section>
