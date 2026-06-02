function initImageQueue() {
    const input = document.querySelector('input[name="image"]');

    if (!input) return;

    input.addEventListener("change", function () {
        const queue = document.getElementById("imageQueue");

        queue.innerHTML = "";

        [...this.files].forEach((file) => {
            queue.innerHTML += `

                <div class="queue-item d-flex justify-content-between align-items-center border p-2 mb-2">

                    <span>${file.name}</span>

                    <span class="status-circle bg-warning"></span>

                </div>

                `;
        });
    });
}
