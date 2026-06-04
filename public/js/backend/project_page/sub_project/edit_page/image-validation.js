function initImageValidation() {
    document.querySelectorAll(".replaceImage").forEach((input) => {
        input.addEventListener("change", function () {
            const file = this.files[0];

            if (!file) return;

            const validTypes = ["image/jpeg", "image/png", "image/webp"];

            if (!validTypes.includes(file.type)) {
                alert(file.name + " invalid format");

                this.value = "";

                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert(file.name + " exceeds 2MB");

                this.value = "";
            }
        });
    });
}
