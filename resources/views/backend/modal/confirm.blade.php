<div class="modal fade" id="backConfirmModal" tabindex="-1" aria-labelledby="backConfirmLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <!-- Header -->
            <div class="modal-header border-0 bg-warning-subtle text-dark">
                <h5 class="modal-title d-flex align-items-center gap-2" id="backConfirmLabel">
                    <i class="fas fa-exclamation-triangle text-warning"></i>
                    Unsaved Changes
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body text-center px-4 py-4">

                <!-- Icon -->
                <div class="mb-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm"
                        style="width:70px;height:70px;background:#fff3cd;">
                        <i class="fas fa-exclamation-circle text-warning fs-2"></i>
                    </div>
                </div>

                <!-- Message -->
                <h5 class="mb-2 fw-semibold">You have unsaved changes</h5>
                <p class="text-muted mb-0" style="font-size: 14px;">
                    If you leave now, all unsaved data will be lost. Do you still want to continue?
                </p>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0 d-flex justify-content-center gap-2 pb-4">

                <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">
                    Stay
                </button>

                <a href="#" class="btn btn-danger px-4 leave-page">
                    Leave Page
                </a>

            </div>

        </div>
    </div>
</div>
