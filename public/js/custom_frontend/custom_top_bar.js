document.addEventListener("DOMContentLoaded", function () {
    // Map Modal
    var mapModal = new bootstrap.Modal(document.getElementById("mapModal"));
    document
        .getElementById("openMapModal")
        .addEventListener("click", function (e) {
            e.preventDefault();
            mapModal.show();
        });

    // Phone Modal
    var phoneModal = new bootstrap.Modal(document.getElementById("phoneModal"));
    document
        .getElementById("openPhoneModal")
        .addEventListener("click", function (e) {
            e.preventDefault();
            phoneModal.show();
        });
});
