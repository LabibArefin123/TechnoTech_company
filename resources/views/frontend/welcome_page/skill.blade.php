<section id="skills" class="techno-skills py-5">

    <link rel="stylesheet" href="{{ asset('css/frontend/custom_skill.css') }}">

    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Left Content --}}
            <div class="col-lg-6">
                <span class="skills-tag">
                    {{ $skillSection->first()->subtitle }}
                </span>

                <h2 class="skills-title">
                    {{ $skillSection->first()->title }}
                </h2>

                <p class="skills-description">
                    {{ $skillSection->first()->description }}
                </p>

                {{-- Skill Bars --}}
                @foreach ($skillSection as $index => $skill)
                    <div class="skill-item" data-delay="{{ $index }}">

                        <div class="skill-label">
                            <span class="skill-name">{{ $skill->name }}</span>
                            <span class="skill-percent">0%</span>
                        </div>

                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="{{ $skill->percent }}">
                                <span class="progress-bubble">0%</span>
                                <div class="wave"></div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

            {{-- Right Image --}}
            <div class="col-lg-6">
                <div class="skills-image">
                    <img src="{{ asset($skillSection->first()->image) }}">
                </div>
            </div>

        </div>
    </div>
</section>
