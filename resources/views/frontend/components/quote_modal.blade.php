<!-- Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-0 rounded-3">

            {{-- Close Button --}}
            <button type="button" class="btn-close position-absolute end-0 m-3" data-bs-dismiss="modal"
                aria-label="Close"></button>

            <div class="modal-body text-center px-4 py-5">

                {{-- Image --}}
                <img src="{{ asset('images/quote/quote-banner.jpg') }}" class="img-fluid rounded mb-4"
                    alt="Construction Project">

                {{-- Heading --}}
                <h3 class="fw-bold mb-3">
                    We Build Buildings and Great Constructive Homes
                </h3>

                {{-- Description --}}
                <p class="text-muted mb-4">
                    We successfully cope with tasks of varying complexity,
                    provide long-term guarantees, and consistently adopt
                    modern engineering and construction technologies.
                </p>

                {{-- Button --}}
                <a href="#contact" class="btn btn-warning px-4 py-2 fw-semibold">
                    Request a Quote
                </a>

                {{-- Divider --}}
                <hr class="my-4">

                {{-- Friendly Line (Before HR requirement satisfied) --}}
                <p class="fw-semibold mb-0">
                    Got a project in mind?
                    <span class="text-primary">Let’s Talk.</span>
                </p>

            </div>
        </div>
    </div>
</div>
