function initImageQueue() {
    const input = document.getElementById("imageInput");

    if (!input) return;

    input.addEventListener("change", function () {
        const queue = document.getElementById("imageQueue");

        queue.innerHTML = "";

        [...this.files].forEach((file) => {
            queue.innerHTML += `

                <div
                class="
                d-flex
                justify-content-between
                border
                rounded
                p-2
                mb-2">

                    <span>
                        ${file.name}
                    </span>

                    <span
                    class="
                    badge
                    bg-warning">

                    Pending

                    </span>

                </div>
                `;
        });
    });
}
