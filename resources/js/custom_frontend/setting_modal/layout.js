import { showToast } from "./toast.js";

function hideAll(selector) {
    document.querySelectorAll(selector).forEach((el) => {
        el.style.display = "none";
    });
}

export function initLayouts(settings, save, csrf) {
    // NAVBAR
    document.querySelectorAll(".navbarLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".topbar-layout, .navbar-layout");

            document
                .getElementById("topbar" + layout)
                ?.style.setProperty("display", "block");
            document
                .getElementById("navbar" + layout)
                ?.style.setProperty("display", "block");

            localStorage.setItem("navbarLayout", layout);

            settings.navbar_layout = layout;

            // 🔥 sync hidden input
            document.getElementById("navbarLayoutInput").value = layout;

            showToast("Navbar Layout " + layout + " applied");

            save(settings, csrf);
        });
    });

    // ABOUT
    document.querySelectorAll(".aboutLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".about-layout");

            document
                .getElementById("about" + layout)
                ?.style.setProperty("display", "block");

            localStorage.setItem("aboutLayout", layout);

            settings.about_layout = layout;

            document.getElementById("aboutLayoutInput").value = layout;

            showToast("About Layout " + layout + " applied");

            save(settings, csrf);
        });
    });

    // FOOTER
    document.querySelectorAll(".footerLayoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            const layout = btn.dataset.layout;

            hideAll(".footer-layout");

            document
                .getElementById("footer" + layout)
                ?.style.setProperty("display", "block");

            localStorage.setItem("footerLayout", layout);

            settings.footer_layout = layout;

            // 🔥 FIXED ID HERE
            document.getElementById("footerLayoutInput").value = layout;

            showToast("Footer Layout " + layout + " applied");

            save(settings, csrf);
        });
    });
}
