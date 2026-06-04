function initImageQueue() {
    document.querySelectorAll(".replaceImage").forEach((input) => {
        input.addEventListener("change", function () {
            const queue = document.getElementById("imageQueue");

            const file = this.files[0];

            if (!file) return;

            queue.innerHTML += `

                <div class="d-flex justify-content-between border rounded p-2 mb-2">

                    <span>${file.name}</span>

                    <span class="badge bg-warning">

                        Pending

                    </span>

                </div>

            `;
        });
    });
}
