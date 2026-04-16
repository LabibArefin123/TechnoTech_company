document.addEventListener("DOMContentLoaded", function () {
    // GLOBAL SELECT
    document
        .getElementById("selectAllPermissions")
        .addEventListener("click", function () {
            document
                .querySelectorAll(".perm-all")
                .forEach((cb) => (cb.checked = true));
        });

    // GLOBAL UNSELECT
    document
        .getElementById("unselectAllPermissions")
        .addEventListener("click", function () {
            document
                .querySelectorAll(".perm-all")
                .forEach((cb) => (cb.checked = false));
        });

    // GROUP SELECT
    document.querySelectorAll(".select-all-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            const group = this.dataset.group;

            document
                .querySelectorAll(".perm-" + group)
                .forEach((cb) => (cb.checked = true));
        });
    });

    // GROUP UNSELECT
    document.querySelectorAll(".unselect-all-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            const group = this.dataset.group;

            document
                .querySelectorAll(".perm-" + group)
                .forEach((cb) => (cb.checked = false));
        });
    });
});
