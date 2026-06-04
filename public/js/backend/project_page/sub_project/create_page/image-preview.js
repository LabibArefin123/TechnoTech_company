function initImagePreview() {
    const input = document.getElementById("imageInput");

    if (!input) return;

    input.addEventListener("change", function () {
        const preview = document.getElementById("previewContainer");

        const titles = document.getElementById("dynamicTitles");

        preview.innerHTML = "";
        titles.innerHTML = "";

        [...this.files].forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML += `

                    <div class="col-md-3 mb-3">

                        <div class="card">

                            <img
                            src="${e.target.result}"
                            class="card-img-top"
                            style="
                            height:180px;
                            object-fit:cover">

                        </div>

                    </div>
                    `;
            };

            reader.readAsDataURL(file);

            titles.innerHTML += `

                <div class="col-md-6 mb-3">

                    <label>
                        Title For
                        ${file.name}
                    </label>

                    <input
                        type="text"
                        name="titles[]"
                        class="form-control"
                        placeholder="Enter title">

                </div>

                `;
        });
    });
}
