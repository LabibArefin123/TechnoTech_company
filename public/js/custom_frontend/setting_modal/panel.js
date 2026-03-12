export function initPanel() {
    const btn = document.getElementById("floatingSettingsBtn");
    const panel = document.getElementById("settingsPanel");
    const close = document.getElementById("closeSettingsPanel");

    if (!btn || !panel) return;

    const openPanel = () => {
        panel.style.right = "0";
    };

    const closePanel = () => {
        panel.style.right = "-350px";
    };

    // open
    btn.addEventListener("click", (e) => {
        e.stopPropagation();
        openPanel();
    });

    // close button
    if (close) {
        close.addEventListener("click", closePanel);
    }

    // click outside panel
    document.addEventListener("click", (e) => {
        const isInside = panel.contains(e.target);
        const isButton = btn.contains(e.target);

        if (!isInside && !isButton) {
            closePanel();
        }
    });

    // prevent closing when clicking inside panel
    panel.addEventListener("click", (e) => {
        e.stopPropagation();
    });

    // ESC key close
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closePanel();
        }
    });
}
