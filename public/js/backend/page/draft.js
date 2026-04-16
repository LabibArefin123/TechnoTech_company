document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll("form");

    if (!forms.length) return;

    forms.forEach((form) => {
        const inputs = form.querySelectorAll("input, textarea, select");

        const formKey =
            form.getAttribute("data-draft-key") || window.location.pathname;

        // =========================
        // LOAD DRAFT
        // =========================
        inputs.forEach((input) => {
            if (!input.name) return;
            if (input.type === "password" || input.type === "file") return;

            const saved = localStorage.getItem(formKey + "_" + input.name);

            if (saved !== null) {
                input.value = saved;
            }
        });

        // =========================
        // SAVE DRAFT
        // =========================
        inputs.forEach((input) => {
            if (!input.name) return;
            if (input.type === "password" || input.type === "file") return;

            input.addEventListener("input", () => {
                localStorage.setItem(formKey + "_" + input.name, input.value);
            });
        });

        // =========================
        // CLEAR ON SUBMIT
        // =========================
        form.addEventListener("submit", () => {
            inputs.forEach((input) => {
                if (!input.name) return;

                localStorage.removeItem(formKey + "_" + input.name);
            });
        });
    });
});
