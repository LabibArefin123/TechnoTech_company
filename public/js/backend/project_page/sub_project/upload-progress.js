function initUploadProgress() {
    const form = document.querySelector("form");

    if (!form) return;

    form.addEventListener("submit", function () {
        updateStage("Validating Files");

        setTimeout(() => {
            updateStage("Preparing Upload");
        }, 500);

        setTimeout(() => {
            updateStage("Uploading Images");
        }, 1000);

        setTimeout(() => {
            updateStage("Saving Records");
        }, 1500);
    });
}

function updateStage(text) {
    const stage = document.getElementById("uploadStage");

    if (stage) {
        stage.innerText = text;
    }
}
