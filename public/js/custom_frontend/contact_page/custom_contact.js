document
    .getElementById("emailModalTrigger")
    .addEventListener("click", function () {
        var emailModal = new bootstrap.Modal(
            document.getElementById("emailModal"),
        );
        emailModal.show();
    });

document
    .getElementById("callModalTrigger")
    .addEventListener("click", function () {
        var callModal = new bootstrap.Modal(
            document.getElementById("callModal"),
        );
        callModal.show();
    });
