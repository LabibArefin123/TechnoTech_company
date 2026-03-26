import { initPanel } from "./panel.js";
import { initTheme } from "./theme.js";
import { initLayouts } from "./layout.js";
import { initExtras } from "./extras.js";
import { saveSettings } from "./storage.js";

document.addEventListener("DOMContentLoaded", () => {
    const csrf =
        document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content") || "";

    // 🔥 CENTRAL STATE (single source of truth)
    const settings = {
        theme_color: null,
        text_size: null,
        navbar_layout: 1,
        about_layout: 1,
        footer_layout: 1,
        animations: 0,
        back_to_top: 0,
        dark_mode: 0,
    };

    initPanel();

    initTheme(settings, saveSettings, csrf);
    initLayouts(settings, saveSettings, csrf);
    initExtras(settings, saveSettings, csrf);

    // ✅ SAVE BUTTON HANDLER (IMPORTANT)
    const form = document.getElementById("settingsForm");

    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // 🔥 sync hidden inputs → settings object
            settings.theme_color =
                document.getElementById("themeColorInput")?.value;

            settings.text_size =
                document.getElementById("textSizeInput")?.value;

            settings.navbar_layout =
                document.getElementById("navbarLayoutInput")?.value || 1;

            settings.about_layout =
                document.getElementById("aboutLayoutInput")?.value || 1;

            settings.footer_layout =
                document.getElementById("footerLayoutInput")?.value || 1;

            settings.dark_mode = document.getElementById("darkModeToggle")
                ?.checked
                ? 1
                : 0;

            saveSettings(settings, csrf);
        });
    }
});

console.log("✅ Settings module loaded");
