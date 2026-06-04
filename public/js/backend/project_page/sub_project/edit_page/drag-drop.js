function initDragDrop() {
    const zone = document.getElementById("dropZone");

    if (!zone) return;

    zone.addEventListener("dragover", function (e) {
        e.preventDefault();

        zone.classList.add("border-primary");
    });

    zone.addEventListener("dragleave", function () {
        zone.classList.remove("border-primary");
    });
}
