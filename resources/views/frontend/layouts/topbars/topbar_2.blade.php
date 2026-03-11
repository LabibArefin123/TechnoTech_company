<link rel="stylesheet" href="{{ asset('css/frontend/custom_topbar.css') }}">

<div style="background:#f8f9fa;border-bottom:1px solid #ddd;padding:6px 0;">
    <style>
        .goog-te-banner-frame.skiptranslate,
        .goog-te-balloon-frame,
        #goog-gt-tt {
            display: none !important;
        }

        .goog-te-gadget {
            height: 0 !important;
            overflow: hidden;
        }
    </style>
    <div class="container d-flex justify-content-between align-items-center">

        <div class="small text-dark">

            <i class="fas fa-phone"></i> 01754-327566

            <span class="mx-2">|</span>

            <i class="fas fa-envelope"></i> info@technotech.com

        </div>
        <!-- Hidden Google Translate Widget -->
        <div id="google_translate_element" style="display:none;"></div>
        <div class="d-flex align-items-center gap-3">

            <a href="#" class="text-dark">
                <i class="fab fa-facebook"></i>
            </a>

            <a href="#" class="text-dark">
                <i class="fab fa-linkedin"></i>
            </a>

            <button id="langToggle"
                style="background:#198754;color:white;border:none;padding:4px 10px;border-radius:4px;">
                EN
            </button>

        </div>

    </div>

</div>
<!-- Google Translate Library -->
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!------start of translate english/bangla link js--->
