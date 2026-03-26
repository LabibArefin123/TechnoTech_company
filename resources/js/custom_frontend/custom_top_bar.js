document.addEventListener("DOMContentLoaded", function () {
    const mapModal = new bootstrap.Modal(document.getElementById("mapModal"));
    const phoneModal = new bootstrap.Modal(
        document.getElementById("phoneModal"),
    );
    const emailModal = new bootstrap.Modal(
        document.getElementById("emailModal"),
    );

    document.body.addEventListener("click", function (e) {
        if (e.target.closest(".openMapModal")) {
            e.preventDefault();
            mapModal.show();
        }
        if (e.target.closest(".openPhoneModal")) {
            e.preventDefault();
            phoneModal.show();
        }
        if (e.target.closest(".openEmailModal")) {
            e.preventDefault();
            emailModal.show();
        }
    });
});
