$(document).ready(function () {
    let isFormDirty = false;
    let leaveUrl = null;

    // Detect input changes
    $("form :input").on("change keyup", function () {
        isFormDirty = true;
    });

    // Intercept link clicks
    $("a").on("click", function (e) {
        let href = $(this).attr("href");

        // Ignore empty or anchor links
        if (!href || href === "#" || href.startsWith("#")) return;

        if (isFormDirty) {
            e.preventDefault();
            leaveUrl = href;

            let modal = new bootstrap.Modal(
                document.getElementById("backConfirmModal"),
            );
            modal.show();
        }
    });

    // Handle Leave button
    $(".leave-page").on("click", function (e) {
        e.preventDefault();

        if (leaveUrl) {
            isFormDirty = false;
            window.location.href = leaveUrl;
        }
    });

    // Handle browser back/refresh
    window.addEventListener("beforeunload", function (e) {
        if (isFormDirty) {
            e.preventDefault();
            e.returnValue = "";
        }
    });
});
