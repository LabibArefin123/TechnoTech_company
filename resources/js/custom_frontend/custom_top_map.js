document.addEventListener("DOMContentLoaded", function () {
    const openButton = document.getElementById("openTopLocationModal");

    const modal = document.getElementById("topLocationModal");

    const closeButton = document.querySelector(".top-location-close");

    if (!openButton || !modal) {
        return;
    }

    openButton.addEventListener("click", function (e) {
        e.preventDefault();

        modal.style.display = "flex";
    });

    closeButton.addEventListener("click", function () {
        modal.style.display = "none";
    });

    modal.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            modal.style.display = "none";
        }
    });
});
