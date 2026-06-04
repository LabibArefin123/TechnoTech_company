document.addEventListener("DOMContentLoaded", function () {
    const modalElement = document.getElementById("imageZoomModal");

    if (!modalElement) return;

    const modal = new bootstrap.Modal(modalElement);

    const zoomedImage = document.getElementById("zoomedImage");

    document.querySelectorAll(".galleryZoom").forEach(function (image) {
        image.addEventListener("click", function () {
            zoomedImage.src = this.dataset.image;

            modal.show();
        });
    });
});
