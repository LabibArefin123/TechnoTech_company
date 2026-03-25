    {{-- LEFT : ABOUT --}}
    <div class="about-slider">
        {{-- Logo Placeholder --}}
        <div class="company-logo-placeholder mb-4">
            {{-- Add your logo later --}}
        </div>

        {{-- SHORT ABOUT --}}
        <div class="about-content short" id="aboutShort">
            <h4 class="fw-bold mb-3">About TechnoTech Engineering Ltd</h4>
            <p>
                TechnoTech Engineering Ltd, established in 1995, began as a mechanical construction firm
                formed by highly qualified engineers. We successfully complete sophisticated projects
                across gas pipelines, power plants, oil refineries, and industrial sectors.
            </p>

            <button class="btn btn-outline-primary rounded-pill mt-3" onclick="toggleAbout(true)">
                More Information
            </button>
        </div>

        {{-- FULL ABOUT --}}
        <div class="about-content full" id="aboutFull" style="display:none;">
            <h4 class="fw-bold mb-3">Our Legacy & Expertise</h4>
            <p>
                TechnoTech Engineering Ltd has vast experience in boilers, turbines, generators, civil,
                mechanical, and electrical works, as well as refractory and insulation services. We collaborate
                with local and international professionals to deliver specialized expertise in every project.
            </p>

            <h5 class="mt-3">Our Services</h5>
            <ul class="ps-3">
                <li>Boilers, Turbines, Generators, Furnaces & Heavy Equipment</li>
                <li>Civil, Mechanical & Electrical Erection and Installation</li>
                <li>Steel Storage Tanks, Chimneys, Refractory & Insulation Works</li>
                <li>Construction Management & Equipment Handling</li>
                <li>Design, Installation & Commissioning of Industrial Plants</li>
            </ul>

            <h5 class="mt-3">Key Activities</h5>
            <ul class="ps-3">
                <li>Power Plant Erection & Commissioning</li>
                <li>Industrial Equipment Installation & Revamping</li>
                <li>Pipeline, Cooling Tower & Fuel System Design & Installation</li>
                <li>Construction Management & Logistics</li>
            </ul>

            <button class="btn btn-outline-primary rounded-pill mt-3" onclick="toggleAbout(false)">
                Show Less
            </button>
        </div>
    </div>
