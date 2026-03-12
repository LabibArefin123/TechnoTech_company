// setting_modal.js

document.addEventListener("DOMContentLoaded", () => {
    const settingsBtn = document.getElementById("floatingSettingsBtn");
    const settingsPanel = document.getElementById("settingsPanel");
    const closePanel = document.getElementById("closeSettingsPanel");

    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    const csrf = csrfMeta ? csrfMeta.getAttribute("content") : "";

    let settings = {
        theme_color: null,
        text_size: null,
        navbar_layout: 1,
        about_layout: 1,
        footer_layout: 1,
        animations: 0,
        back_to_top: 0,
        dark_mode: 0,
    };

    /*
    -------------------------
    TOAST NOTIFICATION
    -------------------------
    */

    function showToast(message) {
        const toast = document.createElement("div");

        toast.innerText = message;

        toast.style.position = "fixed";
        toast.style.bottom = "30px";
        toast.style.right = "30px";
        toast.style.background = "#28a745";
        toast.style.color = "#fff";
        toast.style.padding = "12px 18px";
        toast.style.borderRadius = "6px";
        toast.style.zIndex = "99999";
        toast.style.boxShadow = "0 5px 15px rgba(0,0,0,0.2)";
        toast.style.fontSize = "14px";

        document.body.appendChild(toast);

        setTimeout(() => toast.remove(), 2500);
    }

    /*
    -------------------------
    PANEL OPEN / CLOSE
    -------------------------
    */

    if (settingsBtn && settingsPanel) {
        settingsBtn.addEventListener("click", () => {
            settingsPanel.style.right = "0";
        });
    }

    if (closePanel && settingsPanel) {
        closePanel.addEventListener("click", () => {
            settingsPanel.style.right = "-350px";
        });
    }

    /*
    -------------------------
    THEME COLOR
    -------------------------
    */

    document.querySelectorAll(".themeColor").forEach((el) => {
        el.addEventListener("click", () => {
            const color = el.dataset.color;

            document.documentElement.style.setProperty("--theme-color", color);

            localStorage.setItem("themeColor", color);

            settings.theme_color = color;

            showToast("Theme color updated 🎨");

            saveSettings();
        });
    });

    /*
    -------------------------
    TEXT SIZE
    -------------------------
    */

    document.querySelectorAll(".textSizeBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const size = btn.dataset.size;

            document.body.style.fontSize = size + "px";

            localStorage.setItem("textSize", size);

            settings.text_size = size;

            showToast("Text size updated 🔤");

            saveSettings();
        });
    });

    /*
    -------------------------
    NAVBAR LAYOUT
    -------------------------
    */

    document.querySelectorAll(".navbarLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            document
                .querySelectorAll(".topbar-layout, .navbar-layout")
                .forEach((el) => (el.style.display = "none"));

            const topbar = document.getElementById("topbar" + layout);
            const navbar = document.getElementById("navbar" + layout);

            if (topbar) topbar.style.display = "block";
            if (navbar) navbar.style.display = "block";

            localStorage.setItem("navbarLayout", layout);

            settings.navbar_layout = layout;

            showToast("Navbar Layout " + layout + " applied");

            saveSettings();
        });
    });

    /*
    -------------------------
    ABOUT LAYOUT
    -------------------------
    */

    document.querySelectorAll(".aboutLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            document
                .querySelectorAll(".about-layout")
                .forEach((el) => (el.style.display = "none"));

            const about = document.getElementById("about" + layout);

            if (about) about.style.display = "block";

            localStorage.setItem("aboutLayout", layout);

            settings.about_layout = layout;

            showToast("About Layout " + layout + " applied");

            saveSettings();
        });
    });

    /*
    -------------------------
    FOOTER LAYOUT
    -------------------------
    */

    document.querySelectorAll(".footerLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            document
                .querySelectorAll(".footer-layout")
                .forEach((el) => (el.style.display = "none"));

            const footer = document.getElementById("footer" + layout);

            if (footer) footer.style.display = "block";

            localStorage.setItem("footerLayout", layout);

            settings.footer_layout = layout;

            showToast("Footer Layout " + layout + " applied");

            saveSettings();
        });
    });

    /*
    -------------------------
    EXTRA SETTINGS
    -------------------------
    */

    const enableAnimations = document.getElementById("enableAnimations");
    const showBackToTop = document.getElementById("showBackToTop");
    const darkModeToggle = document.getElementById("darkModeToggle");

    if (enableAnimations) {
        enableAnimations.addEventListener("change", (e) => {
            settings.animations = e.target.checked ? 1 : 0;

            localStorage.setItem("enableAnimations", e.target.checked);

            showToast("Animations updated");

            saveSettings();
        });
    }

    if (showBackToTop) {
        showBackToTop.addEventListener("change", (e) => {
            const backBtn = document.getElementById("backToTop");

            if (backBtn) {
                backBtn.style.display = e.target.checked ? "block" : "none";
            }

            settings.back_to_top = e.target.checked ? 1 : 0;

            localStorage.setItem("showBackToTop", e.target.checked);

            showToast("Back to top setting updated");

            saveSettings();
        });
    }

    if (darkModeToggle) {
        darkModeToggle.addEventListener("change", (e) => {
            document.body.classList.toggle("dark-mode", e.target.checked);

            settings.dark_mode = e.target.checked ? 1 : 0;

            localStorage.setItem("darkMode", e.target.checked);

            showToast("Dark mode updated 🌙");

            saveSettings();
        });
    }

    /*
    -------------------------
    LOAD SAVED SETTINGS
    -------------------------
    */

    function loadSettings() {
        const navbarLayout = localStorage.getItem("navbarLayout") || "1";
        const aboutLayout = localStorage.getItem("aboutLayout") || "1";
        const footerLayout = localStorage.getItem("footerLayout") || "1";

        settings.navbar_layout = navbarLayout;
        settings.about_layout = aboutLayout;
        settings.footer_layout = footerLayout;

        // Hide all layouts first
        document
            .querySelectorAll(".topbar-layout, .navbar-layout")
            .forEach((el) => {
                el.style.display = "none";
            });

        document.querySelectorAll(".about-layout").forEach((el) => {
            el.style.display = "none";
        });

        document.querySelectorAll(".footer-layout").forEach((el) => {
            el.style.display = "none";
        });

        // Show selected ones
        const topbar = document.getElementById("topbar" + navbarLayout);
        const navbar = document.getElementById("navbar" + navbarLayout);
        const about = document.getElementById("about" + aboutLayout);
        const footer = document.getElementById("footer" + footerLayout);

        if (topbar) topbar.style.display = "block";
        if (navbar) navbar.style.display = "block";
        if (about) about.style.display = "block";
        if (footer) footer.style.display = "block";
    }

    loadSettings();

    /*
    -------------------------
    SAVE SETTINGS TO SERVER
    -------------------------
    */

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
            .then((data) => {
                console.log("Settings Saved:", data);
            })
            .catch((error) => {
                console.error("Settings Save Error:", error);
            });
    }
});
