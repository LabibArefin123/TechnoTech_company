<div id="topLocationModal" class="top-location-modal">
    <style>
        .top-location-modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .65);
            z-index: 999999;
            justify-content: center;
            align-items: center;
        }

        .top-location-modal-content {
            background: #fff;
            width: 900px;
            max-width: 95%;
            border-radius: 12px;
            padding: 20px;
            position: relative;
            animation: popup .25s ease;
        }

        .top-location-close {
            position: absolute;
            right: 18px;
            top: 12px;
            font-size: 30px;
            cursor: pointer;
        }

        @keyframes popup {
            from {
                transform: scale(.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
    <div class="top-location-modal-content">

        <span class="top-location-close">&times;</span>

        <h4 class="mb-3">

            <i class="fas fa-map-marker-alt text-danger"></i>

            Our Location

        </h4>

        <iframe src="https://www.google.com/maps?q=106/A+Green+Road+Farmgate+Dhaka+1205&output=embed" width="100%"
            height="450" style="border:0;border-radius:10px;" loading="lazy" allowfullscreen>
        </iframe>

    </div>

</div>
