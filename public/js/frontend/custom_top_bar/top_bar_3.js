document.addEventListener("DOMContentLoaded", () => {
    if (typeof bootstrap === "undefined") {
        console.error("❌ Bootstrap not loaded");
        return;
    }

    const btn = document.getElementById("openMapModal");
    const modalEl = document.getElementById("mapModal");

    if (!btn || !modalEl) return;

    const mapModal = new bootstrap.Modal(modalEl);

    btn.addEventListener("click", (e) => {
        e.preventDefault();
        mapModal.show();
    });
});
