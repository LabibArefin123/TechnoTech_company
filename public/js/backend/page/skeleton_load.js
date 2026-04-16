window.addEventListener("load", function () {
    const skeleton = document.getElementById("adminSkeleton");

    setTimeout(() => {
        skeleton.style.opacity = "0";
        skeleton.style.transition = "0.4s ease";

        setTimeout(() => {
            skeleton.style.display = "none";
        }, 400);
    }, 300);
});
