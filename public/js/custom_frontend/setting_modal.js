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
        navbar_layout: 1,
        about_layout: 1,
        animations: 0,
        back_to_top: 0,
        dark_mode: 0,
    };

    // ------------------------
    // SIMPLE TOASTER
    // ------------------------

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

        setTimeout(() => {
            toast.remove();
        }, 2500);
    }

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

            showToast("Theme color updated 🎨");

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

            showToast("Text size updated 🔤");

            saveSettings();
        });
    });

    // ------------------------
    // NAVBAR LAYOUT
    // ------------------------

    document.querySelectorAll(".navbarLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            document
                .querySelectorAll(".topbar-layout, .navbar-layout")
                .forEach((el) => (el.style.display = "none"));

            const activeTopbar = document.getElementById("topbar" + layout);
            const activeNavbar = document.getElementById("navbar" + layout);

            if (activeTopbar) activeTopbar.style.display = "block";
            if (activeNavbar) activeNavbar.style.display = "block";

            localStorage.setItem("layout", layout);

            settings.navbar_layout = layout;

            showToast("Navbar Layout " + layout + " applied ✨");

            saveSettings();
        });
    });

    // ------------------------
    // ABOUT LAYOUT
    // ------------------------

    document.querySelectorAll(".aboutLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            document
                .querySelectorAll(".about-layout")
                .forEach((el) => (el.style.display = "none"));

            const active = document.getElementById("about" + layout);

            if (active) active.style.display = "block";

            localStorage.setItem("aboutLayout", layout);

            settings.about_layout = layout;

            showToast("About Layout " + layout + " applied 🎉");

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

        showToast("Animations updated");

        saveSettings();
    });

    showBackToTop?.addEventListener("change", (e) => {
        const backBtn = document.getElementById("backToTop");

        if (backBtn)
            backBtn.style.display = e.target.checked ? "block" : "none";

        settings.back_to_top = e.target.checked ? 1 : 0;

        localStorage.setItem("showBackToTop", e.target.checked);

        showToast("Back to top setting updated");

        saveSettings();
    });

    darkModeToggle?.addEventListener("change", (e) => {
        document.body.classList.toggle("dark-mode", e.target.checked);

        settings.dark_mode = e.target.checked ? 1 : 0;

        localStorage.setItem("darkMode", e.target.checked);

        showToast("Dark mode updated 🌙");

        saveSettings();
    });

    // ------------------------
    // LOAD SETTINGS
    // ------------------------

    function loadSettings() {
        const layout = localStorage.getItem("layout") || "1";
        const aboutLayout = localStorage.getItem("aboutLayout") || "1";
        document
            .querySelectorAll(".about-layout")
            .forEach((el) => (el.style.display = "none"));

        const activeAbout = document.getElementById("about" + aboutLayout);

        if (activeAbout) activeAbout.style.display = "block";

        settings.navbar_layout = layout;
        settings.about_layout = aboutLayout;
    }

    loadSettings();

    // ------------------------
    // SAVE SETTINGS
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
            .then((data) => {
                console.log("Saved", data);
            })
            .catch((err) => {
                console.error("Error:", err);
            });
    }
});
