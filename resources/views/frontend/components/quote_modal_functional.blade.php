<div class="modal fade" id="quoteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            {{-- HEADER --}}
            <div class="p-4 text-white" style="background: linear-gradient(135deg, #ff6b6b, #ff8e8e);">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-file-signature me-2"></i> Request a Quote
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <p class="small mt-2 mb-0 opacity-75">
                    Tell us about your project — we’ll get back to you quickly.
                </p>
            </div>

            {{-- BODY --}}
            <div class="p-4">

                {{-- SUCCESS MESSAGE --}}
                @if (session('success'))
                    <div class="alert alert-success text-center rounded-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('quote.store') }}">
                    @csrf

                    {{-- NAME --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control rounded-3" id="name"
                            placeholder="Your Name" required>
                        <label for="name">Full Name</label>
                    </div>

                    {{-- PHONE --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="phone" class="form-control rounded-3" id="phone"
                            placeholder="Phone Number" required>
                        <label for="phone">Phone Number</label>
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-3" id="email"
                            placeholder="Email">
                        <label for="email">Email Address (Optional)</label>
                    </div>

                    {{-- PROJECT TYPE --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="project_type" class="form-control rounded-3" id="project_type"
                            placeholder="Project Type">
                        <label for="project_type">Project Type</label>
                    </div>

                    {{-- MESSAGE --}}
                    <div class="form-floating mb-4">
                        <textarea name="message" class="form-control rounded-3" placeholder="Project details" id="message"
                            style="height: 100px"></textarea>
                        <label for="message">Project Details</label>
                    </div>

                    {{-- BUTTON --}}
                    <button class="btn w-100 py-2 fw-semibold rounded-pill" style="background:#ff6b6b;color:white;">
                        <i class="fas fa-paper-plane me-1"></i> Submit Request
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
