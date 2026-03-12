<!-- Floating Settings Button -->
<div id="floatingSettingsBtn" title="Settings"
    style="position:fixed;top:60%;right:20px;z-index:9999;background:#ff6b6b;color:#fff;width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 4px 12px rgba(0,0,0,0.2);">
    <i class="fas fa-cog"></i>
</div>

<!-- Settings Panel -->
<div id="settingsPanel"
    style="position:fixed;top:0;right:-350px;width:350px;height:100%;background:#fff;box-shadow:-4px 0 16px rgba(0,0,0,0.2);z-index:9998;padding:20px;overflow-y:auto;transition:right .4s;">
    <div style="display:flex;justify-content:space-between;align-items:center;">
        <h4>Website Settings</h4>
        <button id="closeSettingsPanel" style="background:none;border:none;font-size:22px;">&times;</button>
    </div>
    <hr>

    <form id="settingsForm">
        @csrf
        <!-- Theme -->
        <div>
            <h5>Theme Color</h5>
            <div style="display:flex;gap:10px;margin-top:10px;">
                <div class="themeColor" data-color="#ff6b6b"
                    style="width:30px;height:30px;background:#ff6b6b;border-radius:50%;cursor:pointer;"></div>

                <div class="themeColor" data-color="#1e90ff"
                    style="width:30px;height:30px;background:#1e90ff;border-radius:50%;cursor:pointer;"></div>

                <div class="themeColor" data-color="#28a745"
                    style="width:30px;height:30px;background:#28a745;border-radius:50%;cursor:pointer;"></div>

                <div class="themeColor" data-color="#6f42c1"
                    style="width:30px;height:30px;background:#6f42c1;border-radius:50%;cursor:pointer;"></div>
            </div>
            <input type="hidden" name="theme_color" id="themeColorInput">
        </div>
        <hr>
        <!-- Text Size -->
        <div>
            <h5>Text Size</h5>
            <button type="button" class="textSizeBtn btn btn-sm btn-light" data-size="14">A-</button>
            <button type="button" class="textSizeBtn btn btn-sm btn-light" data-size="16">A</button>
            <button type="button" class="textSizeBtn btn btn-sm btn-light" data-size="18">A+</button>
            <button type="button" class="textSizeBtn btn btn-sm btn-light" data-size="20">A++</button>
            <input type="hidden" name="text_size" id="textSizeInput">
        </div>
        <hr>

        <!-- Navbar Layout -->
        <div>
            <h5>Navbar Layout</h5>
            <div style="display:flex;gap:10px;margin-top:10px;">
                <button type="button" class="navbarLayoutBtn btn btn-outline-primary" data-layout="1">Layout 1</button>
                <button type="button" class="navbarLayoutBtn btn btn-outline-primary" data-layout="2">Layout 2</button>
                <button type="button" class="navbarLayoutBtn btn btn-outline-primary" data-layout="3">Layout 3</button>
            </div>
            <input type="hidden" name="navbar_layout" id="layoutInput">
        </div>
        <hr>

        <!-- About Layout -->
        <div>
            <h5>About Layout</h5>
            <div style="display:flex;gap:10px;margin-top:10px;">
                <button type="button" class="aboutLayoutBtn btn btn-outline-primary" data-layout="1">Layout 1</button>
                <button type="button" class="aboutLayoutBtn btn btn-outline-primary" data-layout="2">Layout 2</button>
                <button type="button" class="aboutLayoutBtn btn btn-outline-primary" data-layout="3">Layout 3</button>
            </div>
            <input type="hidden" name="about_layout" id="layoutInput">
        </div>
        <hr>

        <!-- Footer Layout -->
        <div>
            <h5>Footer Layout</h5>

            <div style="display:flex;gap:10px;margin-top:10px;">
                <button type="button" class="footerLayoutBtn btn btn-outline-primary" data-layout="1">
                    Layout 1
                </button>

                <button type="button" class="footerLayoutBtn btn btn-outline-primary" data-layout="2">
                    Layout 2
                </button>

                <button type="button" class="footerLayoutBtn btn btn-outline-primary" data-layout="3">
                    Layout 3
                </button>
            </div>

            <input type="hidden" name="footer_layout" id="footerLayoutInput">
        </div>
        <hr>
        <!-- Extras -->
        <div>
            <h5>Extras</h5>
            <div style="margin-top:10px;">
                <label>
                    <input type="checkbox" id="enableAnimations" name="animations" value="1"> Enable Animations
                </label>
                <br>
                <label>
                    <input type="checkbox" id="showBackToTop" name="back_to_top" value="1"> Show Back To Top
                </label>
                <br>
                <label>
                    <input type="checkbox" id="darkModeToggle" name="dark_mode" value="1"> Dark Mode
                </label>
            </div>
        </div>

        <hr>

        <button class="btn btn-success w-100">
            Save Settings
        </button>
    </form>
</div>
