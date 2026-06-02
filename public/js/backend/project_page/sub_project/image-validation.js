function initImageValidation() {
    const input = document.getElementById("imageInput");

    if (!input) return;

    input.addEventListener("change", function () {
        [...this.files].forEach((file) => {
            const validTypes = ["image/jpeg", "image/png", "image/webp"];

            if (!validTypes.includes(file.type)) {
                alert(file.name + " invalid format");
            }

            if (file.size > 2 * 1024 * 1024) {
                alert(file.name + " exceeds 2MB");
            }
        });
    });
}
