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
                    structures and the spaces around them. It combines aesthetic
                    excellence with functional performance, using refined layouts,
                    materials, and construction methods delivered by trained professionals.
                </p>

                {{-- Skill Bars --}}
                <div class="skill-item">
                    <div class="skill-label">
                        <span>Architecture</span>
                        <span>87%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width:87%"></div>
                    </div>
                </div>

                <div class="skill-item">
                    <div class="skill-label">
                        <span>Development</span>
                        <span>80%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width:80%"></div>
                    </div>
                </div>

                <div class="skill-item">
                    <div class="skill-label">
                        <span>Design</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width:90%"></div>
                    </div>
                </div>
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
