document.addEventListener("DOMContentLoaded", function () {
    console.log("🚀 SweetAlert Initialized");
    console.log("📦 window.appData:", window.appData);

    if (!window.appData) {
        console.error("❌ appData is missing!");
        return;
    }

    // =========================
    // ✅ SUCCESS (GENERAL)
    // =========================
    if (window.appData.success) {
        console.log("✅ Success message:", window.appData.success);

        Swal.fire({
            icon: "success",
            title: "Success",
            text: window.appData.success,
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            position: "center",
        }).then(() => {
            if (typeof closeProblemModal === "function") {
                closeProblemModal();
            }
        });

        return;
    }

    // =========================
    // ✅ LOGIN SUCCESS
    // =========================
    if (window.appData.login_success) {
        console.log("🎉 Login success:", window.appData.login_success);

        Swal.fire({
            icon: "success",
            title: "Welcome Back 👋",
            text: window.appData.login_success,
            timer: 2000,
            showConfirmButton: false,
        });

        return;
    }

    // =========================
    // 🚫 BANNED USER
    // =========================
    if (window.appData.banned) {
        console.warn("🚫 Banned:", window.appData.banned);

        Swal.fire({
            icon: "error",
            title: "Account Banned",
            text: window.appData.banned,
            confirmButtonColor: "#dc3545",
        });

        return;
    }

    // =========================
    // 🛠 MAINTENANCE
    // =========================
    if (window.appData.maintenance) {
        console.warn("🛠 Maintenance:", window.appData.maintenance);

        Swal.fire({
            icon: "warning",
            title: "System Maintenance",
            text: window.appData.maintenance,
        });

        return;
    }

    // =========================
    // ❌ LOGIN ERROR
    // =========================
    if (window.appData.login_error) {
        console.error("❌ Login error:", window.appData.login_error);

        Swal.fire({
            icon: "error",
            title: "Login Failed",
            text: window.appData.login_error,
            confirmButtonColor: "#dc3545",
        });

        return;
    }

    // =========================
    // ❌ VALIDATION ERRORS
    // =========================
    if (window.appData.errors && window.appData.errors.length > 0) {
        console.error("❌ Validation errors:", window.appData.errors);

        let errorMessages = window.appData.errors
            .map((error) => `• ${error}`)
            .join("<br>");

        Swal.fire({
            icon: "error",
            title: "Submission Failed",
            html: errorMessages,
            confirmButtonColor: "#dc3545",
        });

        if (typeof openProblemModal === "function") {
            openProblemModal();
        }

        return;
    }

    console.log("ℹ️ No alerts to show");
});
