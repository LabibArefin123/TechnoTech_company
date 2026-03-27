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

    // 🔥 CENTRAL STATE
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

    // INIT MODULES
    initPanel();
    initTheme(settings, saveSettings, csrf);
    initLayouts(settings); // ✅ FIXED (removed unused params)
    initExtras(settings, saveSettings, csrf);

    // =========================
    // ✅ SAVE HANDLER (FIXED)
    // =========================
    const form = document.getElementById("settingsForm");

    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // 🔥 ALWAYS READ LATEST VALUES
            settings.theme_color =
                document.getElementById("themeColorInput")?.value || null;
            settings.text_size =
                document.getElementById("textSizeInput")?.value || null;

            settings.navbar_layout =
                document.getElementById("navbarLayoutBtn")?.value ||
                settings.navbar_layout;

            settings.about_layout =
                document.getElementById("aboutLayoutBtn")?.value ||
                settings.about_layout;

            settings.footer_layout =
                document.getElementById("footerLayoutBtn")?.value ||
                settings.footer_layout;

            settings.dark_mode = document.getElementById("darkModeToggle")
                ?.checked
                ? 1
                : 0;

            // 🔥 DEBUG (remove later)
            console.log("✅ FINAL SETTINGS:", settings);

            // 🔥 SAVE
            saveSettings(settings, csrf);
        });
    }
});

console.log("✅ Settings module loaded");
