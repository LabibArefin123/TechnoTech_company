// setting_modal.js

document.addEventListener("DOMContentLoaded", () => {
    const settingsBtn = document.getElementById("floatingSettingsBtn");
    const settingsPanel = document.getElementById("settingsPanel");
    const closePanel = document.getElementById("closeSettingsPanel");

    // Open settings panel
    settingsBtn.addEventListener("click", () => {
        settingsPanel.style.right = "0";
    });

    // Close settings panel
    closePanel.addEventListener("click", () => {
        settingsPanel.style.right = "-350px";
    });

    // Theme color change
    document.querySelectorAll(".themeColor").forEach((el) => {
        el.addEventListener("click", () => {
            document.documentElement.style.setProperty(
                "--theme-color",
                el.dataset.color,
            );
            localStorage.setItem("themeColor", el.dataset.color);
        });
    });

    // Text size change
    document.querySelectorAll(".textSizeBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            document.body.style.fontSize = btn.dataset.size + "px";
            localStorage.setItem("textSize", btn.dataset.size);
        });
    });

    // Layout selection
    document.querySelectorAll(".layoutBtn").forEach((btn) => {
        btn.addEventListener("click", () => {
            document.body.dataset.layout = btn.dataset.layout;
            localStorage.setItem("layout", btn.dataset.layout);
        });
    });

    // Extras
    const enableAnimations = document.getElementById("enableAnimations");
    const showBackToTop = document.getElementById("showBackToTop");
    const darkModeToggle = document.getElementById("darkModeToggle");

    enableAnimations?.addEventListener("change", (e) => {
        localStorage.setItem("enableAnimations", e.target.checked);
    });

    showBackToTop?.addEventListener("change", (e) => {
        const backBtn = document.getElementById("backToTop");
        if (backBtn)
            backBtn.style.display = e.target.checked ? "block" : "none";
        localStorage.setItem("showBackToTop", e.target.checked);
    });

    darkModeToggle?.addEventListener("change", (e) => {
        document.body.classList.toggle("dark-mode", e.target.checked);
        localStorage.setItem("darkMode", e.target.checked);
    });

    // Load saved settings
    const themeColor = localStorage.getItem("themeColor");
    if (themeColor)
        document.documentElement.style.setProperty("--theme-color", themeColor);

    const textSize = localStorage.getItem("textSize");
    if (textSize) document.body.style.fontSize = textSize + "px";

    const layout = localStorage.getItem("layout");
    if (layout) document.body.dataset.layout = layout;

    const showBack = localStorage.getItem("showBackToTop") === "true";
    const backBtn = document.getElementById("backToTop");
    if (backBtn) backBtn.style.display = showBack ? "block" : "none";

    const darkMode = localStorage.getItem("darkMode") === "true";
    document.body.classList.toggle("dark-mode", darkMode);
});
