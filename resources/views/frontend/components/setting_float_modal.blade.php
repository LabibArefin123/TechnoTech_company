<!-- Floating Settings Button -->
<div id="floatingSettingsBtn" title="Settings"
    style="
    position: fixed;
    top: 60%;
    right: 20px;
    z-index: 9999;
    background-color: #ff6b6b;
    color: #fff;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    transition: transform 0.3s;
">
    <i class="fas fa-cog"></i>
</div>

<!-- Right Side Settings Panel -->
<div id="settingsPanel" style="
    position: fixed;
    top: 0;
    right: -350px;
    width: 350px;
    height: 100%;
    background: #fff;
    box-shadow: -4px 0 16px rgba(0,0,0,0.2);
    z-index: 9998;
    padding: 20px;
    overflow-y: auto;
    transition: right 0.4s;
">
    <div style="display:flex; justify-content: space-between; align-items: center;">
        <h4>Settings</h4>
        <button id="closeSettingsPanel" style="background:none; border:none; font-size:20px; cursor:pointer">&times;</button>
    </div>
    <hr>

    <!-- Theme Colors -->
    <div>
        <h5>Theme Color</h5>
        <div style="display:flex; gap:10px; margin-top:10px;">
            <div class="themeColor" data-color="#ff6b6b" style="width:30px; height:30px; background:#ff6b6b; border-radius:50%; cursor:pointer;"></div>
            <div class="themeColor" data-color="#1e90ff" style="width:30px; height:30px; background:#1e90ff; border-radius:50%; cursor:pointer;"></div>
            <div class="themeColor" data-color="#28a745" style="width:30px; height:30px; background:#28a745; border-radius:50%; cursor:pointer;"></div>
            <div class="themeColor" data-color="#6f42c1" style="width:30px; height:30px; background:#6f42c1; border-radius:50%; cursor:pointer;"></div>
        </div>
    </div>

    <hr>

    <!-- Text Size -->
    <div>
        <h5>Text Size</h5>
        <button class="textSizeBtn" data-size="14">A-</button>
        <button class="textSizeBtn" data-size="16">A</button>
        <button class="textSizeBtn" data-size="18">A+</button>
        <button class="textSizeBtn" data-size="20">A++</button>
    </div>

    <hr>

    <!-- Layout Selection -->
    <div>
        <h5>Navbar Layout</h5>
        <div style="display:flex; gap:10px; margin-top:10px;">
            <button class="layoutBtn" data-layout="1" style="flex:1;">Layout 1</button>
            <button class="layoutBtn" data-layout="2" style="flex:1;">Layout 2</button>
            <button class="layoutBtn" data-layout="3" style="flex:1;">Layout 3</button>
        </div>
    </div>

    <hr>

    <!-- Additional Customer-Friendly Settings -->
    <div>
        <h5>Extras</h5>
        <div style="margin-top:10px;">
            <label><input type="checkbox" id="enableAnimations" checked> Enable Animations</label><br>
            <label><input type="checkbox" id="showBackToTop"> Show Back to Top Button</label><br>
            <label><input type="checkbox" id="darkModeToggle"> Dark Mode</label>
        </div>
    </div>
</div>