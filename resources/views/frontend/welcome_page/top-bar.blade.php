<!-- Top Info Bar -->
<link rel="stylesheet" href="{{ asset('css/frontend/custom_topbar.css') }}">
<div class="bg-info  py-2">
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
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
        <!-- LEFT : Address + WhatsApp + Map -->
        <div class="d-flex align-items-center flex-wrap gap-2 text-white">
            <i class="fas fa-map-marker-alt"></i>
            <a href="#" class="header-link " id="openMapModal">
                106/A,Green Road(3rd Floor), Farmgate, Corner Place Super Market, Dhaka-1205
            </a>
            <span class="mx-2">|</span>
             <a href="#" class="header-link open-phone-modal">
                <i class="fas fa-phone-alt"></i>
               01754-327566
            </a>

        </div>
        <!-- Hidden Google Translate Widget -->
        <div id="google_translate_element" style="display:none;"></div>
        <!-- RIGHT : SOCIAL ICONS -->
        <div class="d-flex align-items-center gap-2">
      
            <a href="https://www.facebook.com/profile.php?id=61588160976984" class="social-icon" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <button id="langToggle"
                style="background:#ff6b6b; color:white; padding:6px 12px; border:none; border-radius:4px; cursor:pointer;">
                EN
            </button>
        </div>
    </div>
</div>

<!-- Google Translate Library -->
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!------start of translate english/bangla link js--->
