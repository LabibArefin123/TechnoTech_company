<section id="skills" class="techno-skills py-5">

    <link rel="stylesheet" href="{{ asset('css/frontend/custom_skill.css') }}">

    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Left Content --}}
            <div class="col-lg-6">
                <span class="skills-tag">Great Quality Skills</span>

                <h2 class="skills-title">
                    We Make Finest Design<br>
                    With Great Passion
                </h2>

                <p class="skills-description">
                    Architecture refers to the design and planning of buildings and
                    structures and the spaces around them.
                </p>

                {{-- Skill Bars --}}
                @php
                    $skills = [
                        ['name' => 'Architecture', 'percent' => 87],
                        ['name' => 'Development', 'percent' => 80],
                        ['name' => 'Design', 'percent' => 90],
                    ];
                @endphp

                @foreach ($skills as $index => $skill)
                    <div class="skill-item" data-delay="{{ $index }}">
                        <div class="skill-label">
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            <span class="skill-percent">0%</span>
                        </div>

                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="{{ $skill['percent'] }}">
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
                    <img src="{{ asset('uploads/images/welcome_page/skill/image_1.jpg') }}" alt="Skills Image">
                </div>
            </div>

        </div>
    </div>
</section>
