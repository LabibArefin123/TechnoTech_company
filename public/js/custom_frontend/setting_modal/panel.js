export function initPanel() {
    const btn = document.getElementById("floatingSettingsBtn");
    const panel = document.getElementById("settingsPanel");
    const close = document.getElementById("closeSettingsPanel");

    if (btn && panel) {
        btn.addEventListener("click", () => (panel.style.right = "0"));
    }

    if (close && panel) {
        close.addEventListener("click", () => (panel.style.right = "-350px"));
    }
}
