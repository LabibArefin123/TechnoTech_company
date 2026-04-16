document.addEventListener("DOMContentLoaded", () => {
    const modalEl = document.getElementById("contactModal");
    if (!modalEl) return;

    const contactModal = new bootstrap.Modal(modalEl);

    // Use querySelectorAll (better)
    document
        .querySelectorAll("#openContactModal, #openContactModal2")
        .forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                contactModal.show();
            });
        });
});
