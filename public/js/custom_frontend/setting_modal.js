// setting_modal.js

document.addEventListener("DOMContentLoaded", () => {
    const settingsBtn = document.getElementById("floatingSettingsBtn");
    const settingsPanel = document.getElementById("settingsPanel");
    const closePanel = document.getElementById("closeSettingsPanel");

    const csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    let settings = {
        theme_color: null,
        text_size: null,
        navbar_layout: null,
        animations: null,
        back_to_top: null,
        dark_mode: null,
    };

    // ------------------------
    // PANEL OPEN / CLOSE
    // ------------------------
    settingsBtn?.addEventListener(
        "click",
        () => (settingsPanel.style.right = "0"),
    );
    closePanel?.addEventListener(
        "click",
        () => (settingsPanel.style.right = "-350px"),
    );

    // ------------------------
    // THEME COLOR
    // ------------------------
    document.querySelectorAll(".themeColor").forEach((el) => {
        el.addEventListener("click", () => {
            const color = el.dataset.color;
            document.documentElement.style.setProperty("--theme-color", color);
            localStorage.setItem("themeColor", color);
            settings.theme_color = color;
            saveSettings();
        });
    });

    // ------------------------
    // TEXT SIZE
    // ------------------------
    document.querySelectorAll(".textSizeBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const size = btn.dataset.size;
            document.body.style.fontSize = size + "px";
            localStorage.setItem("textSize", size);
            settings.text_size = size;
            saveSettings();
        });
    });

    // ------------------------
    // NAVBAR + TOPBAR LAYOUT
    // ------------------------
    document.querySelectorAll(".layoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            // hide all topbars & navbars
            document
                .querySelectorAll(".topbar-layout, .navbar-layout")
                .forEach((el) => (el.style.display = "none"));

            // show selected layout
            const activeTopbar = document.getElementById("topbar" + layout);
            const activeNavbar = document.getElementById("navbar" + layout);

            if (activeTopbar) activeTopbar.style.display = "block";
            if (activeNavbar) activeNavbar.style.display = "block";

            // save
            localStorage.setItem("layout", layout);
            settings.navbar_layout = layout;
            saveSettings();
        });
    });

    // ------------------------
    // EXTRAS
    // ------------------------
    const enableAnimations = document.getElementById("enableAnimations");
    const showBackToTop = document.getElementById("showBackToTop");
    const darkModeToggle = document.getElementById("darkModeToggle");

    enableAnimations?.addEventListener("change", (e) => {
        settings.animations = e.target.checked ? 1 : 0;
        localStorage.setItem("enableAnimations", e.target.checked);
        saveSettings();
    });

    showBackToTop?.addEventListener("change", (e) => {
        const backBtn = document.getElementById("backToTop");
        if (backBtn)
            backBtn.style.display = e.target.checked ? "block" : "none";
        settings.back_to_top = e.target.checked ? 1 : 0;
        localStorage.setItem("showBackToTop", e.target.checked);
        saveSettings();
    });

    darkModeToggle?.addEventListener("change", (e) => {
        document.body.classList.toggle("dark-mode", e.target.checked);
        settings.dark_mode = e.target.checked ? 1 : 0;
        localStorage.setItem("darkMode", e.target.checked);
        saveSettings();
    });

    // ------------------------
    // LOAD SAVED SETTINGS
    // ------------------------
    function loadSettings() {
        const themeColor = localStorage.getItem("themeColor");
        if (themeColor)
            document.documentElement.style.setProperty(
                "--theme-color",
                themeColor,
            );
        settings.theme_color = themeColor;

        const textSize = localStorage.getItem("textSize");
        if (textSize) document.body.style.fontSize = textSize + "px";
        settings.text_size = textSize;

        const layout = localStorage.getItem("layout") || "1";
        document
            .querySelectorAll(".topbar-layout, .navbar-layout")
            .forEach((el) => (el.style.display = "none"));
        const activeTopbar = document.getElementById("topbar" + layout);
        const activeNavbar = document.getElementById("navbar" + layout);
        if (activeTopbar) activeTopbar.style.display = "block";
        if (activeNavbar) activeNavbar.style.display = "block";
        settings.navbar_layout = layout;

        const showBack = localStorage.getItem("showBackToTop") === "true";
        const backBtn = document.getElementById("backToTop");
        if (backBtn) backBtn.style.display = showBack ? "block" : "none";
        if (showBackToTop) showBackToTop.checked = showBack;
        settings.back_to_top = showBack ? 1 : 0;

        const darkMode = localStorage.getItem("darkMode") === "true";
        document.body.classList.toggle("dark-mode", darkMode);
        if (darkModeToggle) darkModeToggle.checked = darkMode;
        settings.dark_mode = darkMode ? 1 : 0;
    }

    loadSettings();

    // ------------------------
    // SAVE SETTINGS TO LARAVEL
    // ------------------------
    function saveSettings() {
        fetch("/settings/update", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf,
            },
            body: JSON.stringify(settings),
        })
            .then((res) => res.json())
            .then((data) => console.log("Settings Saved", data))
            .catch((err) => console.error("Settings Error:", err));
    }
});
