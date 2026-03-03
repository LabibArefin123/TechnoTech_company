document.addEventListener("DOMContentLoaded", function () {
    if (typeof Swal === "undefined") {
        console.error("SweetAlert2 not loaded");
        return;
    }

    // ==============================
    // 1️⃣ Logout Confirmation
    // ==============================
    const logoutButton = document.querySelector(
        'a[href="#"][onclick*="logout-form"]',
    );
    const logoutForm = document.getElementById("logout-form");

    if (logoutButton && logoutForm) {
        logoutButton.removeAttribute("onclick");
        logoutButton.addEventListener("click", function (e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure you want to log out?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, log out",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Slight delay to ensure session flash persists properly
                    setTimeout(() => logoutForm.submit(), 200);
                }
            });
        });
    }

    // ==============================
    // 2️⃣ Show Notifications
    // ==============================
    const notify = window.appNotifications || {};

    if (notify.login_success) {
        setTimeout(() => {
            Swal.fire({
                icon: "success",
                title: "Welcome back!",
                text: notify.login_success,
                timer: 2500,
                showConfirmButton: false,
            });
        }, 300);
    }

    if (notify.success) {
        Swal.fire({
            icon: "success",
            title: "Success",
            text: notify.success,
            timer: 2000,
            showConfirmButton: false,
        });
    }

    if (notify.error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: notify.error,
            timer: 2500,
            showConfirmButton: false,
        });
    }

    if (notify.warning) {
        Swal.fire({
            icon: "warning",
            title: "Warning",
            text: notify.warning,
            timer: 2500,
            showConfirmButton: false,
        });
    }

    if (notify.info) {
        Swal.fire({
            icon: "info",
            title: "Info",
            text: notify.info,
            timer: 2500,
            showConfirmButton: false,
        });
    }
});
