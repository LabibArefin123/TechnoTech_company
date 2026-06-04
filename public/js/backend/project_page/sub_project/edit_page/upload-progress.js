function initUploadProgress() {
    const form = document.getElementById("subProjectEditForm");

    if (!form) return;

    form.addEventListener("submit", function () {
        const stage = document.getElementById("uploadStage");

        stage.innerHTML = "🔍 Validating";

        setTimeout(() => {
            stage.innerHTML = "📁 Preparing Files";
        }, 500);

        setTimeout(() => {
            stage.innerHTML = "☁ Uploading";
        }, 1000);

        setTimeout(() => {
            stage.innerHTML = "💾 Updating";
        }, 1500);
    });
}
