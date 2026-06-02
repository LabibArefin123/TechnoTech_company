function initImageValidation() {
    const input = document.querySelector('input[name="image"]');

    if (!input) return;

    input.addEventListener("change", function () {
        [...this.files].forEach((file) => {
            if (
                !["image/jpeg", "image/png", "image/webp"].includes(file.type)
            ) {
                alert(file.name + " invalid image format");
            }

            if (file.size > 5 * 1024 * 1024) {
                alert(file.name + " exceeds 5MB");
            }
        });
    });
}
