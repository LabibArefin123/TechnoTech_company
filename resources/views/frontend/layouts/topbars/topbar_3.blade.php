<div style="background:linear-gradient(90deg,#ff6b6b,#6f42c1);color:white;padding:6px 0;">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- MAP TRIGGER -->
        <div>
            <a href="#" data-bs-toggle="modal" data-bs-target="#mapModal" style="color:white; text-decoration:none;">
                <i class="fas fa-map-marker-alt"></i>
                106/A, Green Road (3rd Floor), Farmgate, Dhaka-1205
            </a>
        </div>

        <!-- RIGHT -->
        <div class="d-flex align-items-center gap-3">

            <a href="https://www.facebook.com/" target="_blank" style="color:white;">
                <i class="fab fa-facebook"></i>
            </a>

            <a href="https://www.youtube.com/" target="_blank" style="color:white;">
                <i class="fab fa-youtube"></i>
            </a>

            <button class="langToggle"
                style="background:white;color:#333;border:none;padding:4px 10px;border-radius:4px;">
                EN
            </button>
        </div>
    </div>
</div>
@include('frontend.layouts.topbars.topbar_3_model')

<script src="{{ asset('js/frontend/custom_top_bar/top_bar_3.js') }}"></script>
