<link rel="stylesheet" href="{{ asset('css/frontend/custom_topbar.css') }}">

<div style="background:linear-gradient(90deg,#ff6b6b,#6f42c1);color:white;padding:6px 0;">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-map-marker-alt"></i>
            Dhaka Bangladesh
        </div>
        <!-- Hidden Google Translate Widget -->
        <div id="google_translate_element" style="display:none;"></div>
        <div class="d-flex align-items-center gap-3">
            <span>
                <i class="fas fa-phone"></i>
                01754-327566
            </span>
            <a href="#" style="color:white;">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" style="color:white;">
                <i class="fab fa-youtube"></i>
            </a>
            <button id="langToggle" style="background:white;color:#333;border:none;padding:4px 10px;border-radius:4px;">
                EN
            </button>
        </div>
    </div>
</div>
<!-- Google Translate Library -->
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!------start of translate english/bangla link js--->
