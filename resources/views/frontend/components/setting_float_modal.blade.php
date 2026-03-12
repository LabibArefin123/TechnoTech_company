<!-- Floating Settings Button -->
<div id="floatingSettingsBtn" title="Customize Website">
    <i class="fas fa-cog"></i>
</div>

<!-- Overlay -->
<div id="settingsOverlay"></div>

<!-- Settings Panel -->
<div id="settingsPanel">

    <div class="settings-header">
        <h4><i class="fas fa-sliders-h"></i> Website Customizer</h4>
        <button id="closeSettingsPanel">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <form id="settingsForm">
        @csrf

        <!-- Theme Colors -->
        <div class="settings-card">
            <h5><i class="fas fa-palette"></i> Theme Color</h5>

            <div class="color-grid">

                <div class="themeColor" data-color="#ff6b6b"></div>
                <div class="themeColor" data-color="#1e90ff"></div>
                <div class="themeColor" data-color="#28a745"></div>
                <div class="themeColor" data-color="#6f42c1"></div>
                <div class="themeColor" data-color="#f39c12"></div>
                <div class="themeColor" data-color="#17a2b8"></div>

            </div>

            <input type="hidden" name="theme_color" id="themeColorInput">
        </div>

        <!-- Text Size -->
        <div class="settings-card">
            <h5><i class="fas fa-font"></i> Text Size</h5>

            <div class="btn-group-modern">

                <button type="button" class="textSizeBtn" data-size="14">A-</button>
                <button type="button" class="textSizeBtn" data-size="16">A</button>
                <button type="button" class="textSizeBtn" data-size="18">A+</button>
                <button type="button" class="textSizeBtn" data-size="20">A++</button>

            </div>

            <input type="hidden" name="text_size" id="textSizeInput">
        </div>

        <!-- Navbar Layout -->
        <div class="settings-card">
            <h5><i class="fas fa-bars"></i> Navbar Layout</h5>

            <div class="btn-group-modern">
                <button type="button" class="navbarLayoutBtn" data-layout="1">Layout 1</button>
                <button type="button" class="navbarLayoutBtn" data-layout="2">Layout 2</button>
                <button type="button" class="navbarLayoutBtn" data-layout="3">Layout 3</button>
            </div>

            <input type="hidden" name="navbar_layout" id="navbarLayoutInput">
        </div>

        <!-- About Layout -->
        <div class="settings-card">
            <h5><i class="fas fa-bars"></i> About Layout</h5>

            <div class="btn-group-modern">
                <button type="button" class="aboutLayoutBtn" data-layout="1">Layout 1</button>
                <button type="button" class="aboutLayoutBtn" data-layout="2">Layout 2</button>
                <button type="button" class="aboutLayoutBtn" data-layout="3">Layout 3</button>
            </div>

            <input type="hidden" name="about_layout" id="aboutLayoutInput">
        </div>

        <!-- Footer Layout -->
        <div class="settings-card">
            <h5><i class="fas fa-bars"></i> Footer Layout</h5>

            <div class="btn-group-modern">
                <button type="button" class="footerLayoutBtn" data-layout="1">Layout 1</button>
                <button type="button" class="footerLayoutBtn" data-layout="2">Layout 2</button>
                <button type="button" class="footerLayoutBtn" data-layout="3">Layout 3</button>
            </div>

            <input type="hidden" name="footer_layout" id="footerLayoutBtn">
        </div>

        <!-- Dark Mode -->
        <div class="settings-card">
            <h5><i class="fas fa-moon"></i> Dark Mode</h5>

            <label class="switch">
                <input type="checkbox" id="darkModeToggle" name="dark_mode" value="1">
                <span class="slider"></span>
            </label>

        </div>

        <button class="saveSettingsBtn">
            <i class="fas fa-save"></i> Save Settings
        </button>

    </form>

</div>
