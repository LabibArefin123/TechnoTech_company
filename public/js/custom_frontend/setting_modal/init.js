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
});
