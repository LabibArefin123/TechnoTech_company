document.addEventListener("DOMContentLoaded", function () {
    var offcanvasElement = document.getElementById("quoteOffcanvas");
    var offcanvas = new bootstrap.Offcanvas(offcanvasElement);

    document.getElementById("openQuote").addEventListener("click", function () {
        offcanvas.show();
    });
});
