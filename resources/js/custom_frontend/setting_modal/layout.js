import { showToast } from "./toast.js";

// 🔹 Helper: hide elements
function hideAll(selector) {
    document.querySelectorAll(selector).forEach((el) => {
        el.style.display = "none";
    });
}

// 🔹 Helper: safely set hidden input
function setInputValue(id, value) {
    const input = document.getElementById(id);
    if (input) input.value = value;
}

// 🔹 Helper: activate selected button UI
function setActive(buttons, activeBtn) {
    buttons.forEach((btn) => btn.classList.remove("active"));
    activeBtn.classList.add("active");
}

export function initLayouts(settings) {
    // =========================
    // NAVBAR
    // =========================
    const navbarButtons = document.querySelectorAll(".navbarLayoutBtn");

    navbarButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".topbar-layout, .navbar-layout");

            document
                .getElementById("topbar" + layout)
                ?.style.setProperty("display", "block");
            document
                .getElementById("navbar" + layout)
                ?.style.setProperty("display", "block");

            // 🔥 SAVE STATE
            settings.navbar_layout = layout;
            setInputValue("navbarLayoutBtn", layout);

            localStorage.setItem("navbarLayout", layout);

            setActive(navbarButtons, btn);

            showToast("Navbar Layout " + layout + " applied");
        });
    });

    // =========================
    // ABOUT
    // =========================
    const aboutButtons = document.querySelectorAll(".aboutLayoutBtn");

    aboutButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".about-layout");

            document
                .getElementById("about" + layout)
                ?.style.setProperty("display", "block");

            settings.about_layout = layout;
            setInputValue("aboutLayoutBtn", layout);

            localStorage.setItem("aboutLayout", layout);

            setActive(aboutButtons, btn);

            showToast("About Layout " + layout + " applied");
        });
    });

    // =========================
    // FOOTER
    // =========================
    const footerButtons = document.querySelectorAll(".footerLayoutBtn");

    footerButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".footer-layout");

            document
                .getElementById("footer" + layout)
                ?.style.setProperty("display", "block");

            settings.footer_layout = layout;
            setInputValue("footerLayoutBtn", layout);

            localStorage.setItem("footerLayout", layout);

            setActive(footerButtons, btn);

            showToast("Footer Layout " + layout + " applied");
        });
    });

    // =========================
    // 🔥 LOAD SAVED (IMPORTANT)
    // =========================
    const savedNavbar = localStorage.getItem("navbarLayout") || 1;
    const savedAbout = localStorage.getItem("aboutLayout") || 1;
    const savedFooter = localStorage.getItem("footerLayout") || 1;

    // Apply on load
    document
        .querySelector(`.navbarLayoutBtn[data-layout="${savedNavbar}"]`)
        ?.click();
    document
        .querySelector(`.aboutLayoutBtn[data-layout="${savedAbout}"]`)
        ?.click();
    document
        .querySelector(`.footerLayoutBtn[data-layout="${savedFooter}"]`)
        ?.click();
}
