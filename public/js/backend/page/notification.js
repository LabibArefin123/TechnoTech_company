document.addEventListener("DOMContentLoaded", function () {
    if (typeof Swal === "undefined") {
        console.error("SweetAlert2 is not loaded.");
        return;
    }

    const notify = window.appNotifications || {};

    const showAlert = (icon, title, text) => {
        if (!text) return;

        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            timer: 2500,
            showConfirmButton: false,
        });
    };

    showAlert("success", "Success", notify.success);
    showAlert("error", "Oops...", notify.error);
    showAlert("warning", "Warning", notify.warning);
    showAlert("info", "Info", notify.info);
});
