<div class="modal fade" id="quoteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
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
                    Tell us what you need — we’ll respond quickly 🚀
                </p>
            </div>

            {{-- BODY --}}
            <div class="p-4">

                @if (session('success'))
                    <div class="alert alert-success text-center rounded-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('quote.store') }}">
                    @csrf

                    <div class="row g-4 align-items-stretch">

                        {{-- LEFT SIDE --}}
                        <div class="col-lg-6">

                            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">

                                <h6 class="fw-bold mb-3 text-muted">
                                    👤 Your Information
                                </h6>

                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control rounded-3" required>
                                    <label>Full Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="phone" class="form-control rounded-3" required>
                                    <label>Phone Number</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control rounded-3">
                                    <label>Email (Optional)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="project_type" class="form-control rounded-3">
                                    <label>Project Type</label>
                                </div>

                                <div class="alert alert-light border rounded-3 mt-auto mb-0">
                                    💡 Tip: Clear details = faster & better quotation
                                </div>

                            </div>

                        </div>

                        {{-- RIGHT SIDE --}}
                        <div class="col-lg-6">

                            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 d-flex flex-column">

                                {{-- HEADER ROW --}}
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-bold mb-0 text-muted">
                                        📝 Project Details
                                    </h6>

                                    {{-- TOOLBAR (RIGHT SIDE NOW) --}}
                                    <div class="d-flex gap-1 flex-wrap">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            onclick="insertText('- ')">•</button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            onclick="insertText('\n\n')">↵</button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            onclick="insertText('✔ ')">✔</button>
                                    </div>
                                </div>

                                {{-- TEXTAREA --}}
                                <textarea name="message" id="message" class="form-control rounded-3 shadow-sm flex-grow-1"
                                    style="resize:none; min-height:260px;"
                                    placeholder="Write your project details here...

- What you need
- Budget range
- Timeline
- Special requirements"
                                    oninput="updateCounter()"></textarea>

                                {{-- COUNTER --}}
                                <div class="d-flex justify-content-between mt-2 text-muted small">
                                    <span id="wordCount">Words: 0</span>
                                    <span id="charCount">Characters: 0</span>
                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- SUBMIT --}}
                    <div class="mt-4">
                        <button class="btn w-100 py-2 fw-semibold rounded-pill" style="background:#ff6b6b;color:white;">
                            <i class="fas fa-paper-plane me-1"></i> Submit Request
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        function insertText(text) {
            const textarea = document.getElementById('message');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;

            textarea.value =
                textarea.value.substring(0, start) +
                text +
                textarea.value.substring(end);

            textarea.focus();
            textarea.selectionStart = textarea.selectionEnd = start + text.length;

            updateCounter();
        }

        function updateCounter() {
            const text = document.getElementById('message').value.trim();

            const words = text.length ? text.split(/\s+/).length : 0;
            const chars = text.length;

            document.getElementById('wordCount').innerText = "Words: " + words;
            document.getElementById('charCount').innerText = "Characters: " + chars;
        }

        document.addEventListener("DOMContentLoaded", updateCounter);
    </script>
</div>
