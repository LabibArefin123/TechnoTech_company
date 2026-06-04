function initImagePreview() {
    document.querySelectorAll(".replaceImage").forEach((input) => {
        input.addEventListener("change", function () {
            const previewId = this.dataset.preview;

            const preview = document.getElementById(previewId);

            if (!preview) return;

            const file = this.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        });
    });
}
