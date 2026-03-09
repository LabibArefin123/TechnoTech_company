const input = document.getElementById("imageInput");
const preview = document.getElementById("previewImage");
const placeholder = document.getElementById("previewPlaceholder");
const progress = document.getElementById("uploadProgressBar");
const info = document.getElementById("imageInfo");

const stage1 = document.getElementById("stage1");
const stage2 = document.getElementById("stage2");
const stage3 = document.getElementById("stage3");
const stage4 = document.getElementById("stage4");

let file = null;

input.addEventListener("change", function () {
    file = this.files[0];

    if (!file) return;

    stage1.classList.add("list-group-item-success");
    progress.style.width = "25%";

    setTimeout(() => {
        stage2.classList.add("list-group-item-success");
        progress.style.width = "50%";

        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
            placeholder.style.display = "none";

            const img = new Image();

            img.onload = function () {
                stage3.classList.add("list-group-item-success");
                progress.style.width = "75%";

                let orientation = "Square";

                if (img.width > img.height) orientation = "Landscape";
                if (img.height > img.width) orientation = "Portrait";

                info.innerHTML = `
Dimensions: ${img.width} x ${img.height}px <br>
Orientation: ${orientation} <br>
Type: ${file.type} <br>
Size: ${(file.size / 1024).toFixed(2)} KB
`;

                setTimeout(() => {
                    stage4.classList.add("list-group-item-success");
                    progress.style.width = "100%";
                }, 500);
            };

            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }, 500);
});

document.getElementById("confirmUpload").addEventListener("click", function () {
    if (!file) return;

    document.getElementById("image_path").value = file.name;

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("imageUploadModal"),
    );

    modal.hide();
});
