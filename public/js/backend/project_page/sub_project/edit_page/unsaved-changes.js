let formChanged = false;

function initUnsavedChanges() {
    const form = document.getElementById("subProjectEditForm");

    if (!form) return;

    form.addEventListener("change", function () {
        formChanged = true;
    });

    form.addEventListener("submit", function () {
        formChanged = false;
    });

    window.addEventListener("beforeunload", function (e) {
        if (formChanged) {
            e.preventDefault();

            e.returnValue = "Unsaved changes";
        }
    });
}
