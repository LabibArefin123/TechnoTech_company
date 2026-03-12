import { showToast } from "./toast.js";

function hideAll(selector) {
    document
        .querySelectorAll(selector)
        .forEach((el) => (el.style.display = "none"));
}

export function initLayouts(settings, save, csrf) {
    document.querySelectorAll(".navbarLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".topbar-layout, .navbar-layout");

            const topbar = document.getElementById("topbar" + layout);
            const navbar = document.getElementById("navbar" + layout);

            if (topbar) topbar.style.display = "block";
            if (navbar) navbar.style.display = "block";

            localStorage.setItem("navbarLayout", layout);

            settings.navbar_layout = layout;

            showToast("Navbar Layout " + layout + " applied");

            save(settings, csrf);
        });
    });

    document.querySelectorAll(".aboutLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".about-layout");

            const about = document.getElementById("about" + layout);

            if (about) about.style.display = "block";

            localStorage.setItem("aboutLayout", layout);

            settings.about_layout = layout;

            showToast("About Layout " + layout + " applied");

            save(settings, csrf);
        });
    });

    document.querySelectorAll(".footerLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".footer-layout");

            const footer = document.getElementById("footer" + layout);

            if (footer) footer.style.display = "block";

            localStorage.setItem("footerLayout", layout);

            settings.footer_layout = layout;

            showToast("Footer Layout " + layout + " applied");

            save(settings, csrf);
        });
    });
}
