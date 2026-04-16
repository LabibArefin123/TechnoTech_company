<link rel="stylesheet" href="{{ asset('css/frontend/custom_topbar.css') }}">

<div style="background:#f8f9fa;border-bottom:1px solid #ddd;padding:6px 0;">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="small text-dark">

            <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal" class="text-dark text-decoration-none">
                <i class="fas fa-phone"></i> 01754-327566
            </a>

            <span class="mx-2">|</span>

            <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal"
                class="text-dark text-decoration-none">
                <i class="fas fa-envelope"></i> info@technotech.com
            </a>

        </div>

        <div class="d-flex align-items-center gap-3">

            <a href="https://www.facebook.com/" target="_blank" class="text-dark">
                <i class="fab fa-facebook"></i>
            </a>

            <a href="https://www.youtube.com/" target="_blank" class="text-dark">
                <i class="fab fa-youtube"></i>
            </a>

            <button class="langToggle"
                style="background:#198754;color:white;border:none;padding:4px 10px;border-radius:4px;">
                EN
            </button>

        </div>

    </div>

</div>
<!-- 🔥 PROFESSIONAL MODAL -->
<div class="modal fade" id="contactModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-4">

            <!-- HEADER -->
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Contact Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body pt-2">

                <div class="d-flex align-items-center gap-3 mb-3 p-3 rounded-3 bg-light">
                    <i class="fas fa-phone fa-lg text-success"></i>
                    <div>
                        <div class="fw-semibold">Phone</div>
                        <a href="tel:01754327566" class="text-decoration-none text-dark">
                            01754-327566
                        </a>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                    <i class="fas fa-envelope fa-lg text-primary"></i>
                    <div>
                        <div class="fw-semibold">Email</div>
                        <a href="mailto:info@technotech.com" class="text-decoration-none text-dark">
                            info@technotech.com
                        </a>
                    </div>
                </div>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-0 pt-0">
                <button class="btn btn-dark w-100" data-bs-dismiss="modal">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/frontend/custom_top_bar/top_bar_2.js') }}"></script>
