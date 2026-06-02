function initImagePreview() {
    const input = document.querySelector('input[name="image"]');

    if (!input) return;

    input.addEventListener("change", function () {
        const preview = document.getElementById("previewContainer");

        preview.innerHTML = "";

        [...this.files].forEach((file) => {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML += `
                    <div class="preview-item">

                        <img src="${e.target.result}"
                             class="img-thumbnail">

                    </div>
                `;
            };

            reader.readAsDataURL(file);
        });
    });
}
