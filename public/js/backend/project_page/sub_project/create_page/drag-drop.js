function initDragDrop() {
    const zone = document.getElementById("dropZone");

    if (!zone) return;

    zone.addEventListener("dragover", (e) => {
        e.preventDefault();

        zone.classList.add("border-primary");
    });

    zone.addEventListener("dragleave", () => {
        zone.classList.remove("border-primary");
    });
}
