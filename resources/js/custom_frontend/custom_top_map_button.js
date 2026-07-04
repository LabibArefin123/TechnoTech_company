document.addEventListener("DOMContentLoaded", function () {
    const address =
        "106/A Green Road, Farmgate, Corner Place Super Market, Dhaka 1205, Bangladesh";

    const encodedAddress = encodeURIComponent(address);

    const googleButton = document.getElementById("openGoogleMaps");

    const uberButton = document.getElementById("openUber");

    if (googleButton) {
        googleButton.addEventListener("click", function () {
            const appLink = "comgooglemaps://?q=" + encodedAddress;

            const webLink =
                "https://www.google.com/maps/search/?api=1&query=" +
                encodedAddress;

            openApplication(appLink, webLink);
        });
    }

    if (uberButton) {
        uberButton.addEventListener("click", function () {
            const appLink =
                "uber://?action=setPickup&dropoff[formatted_address]=" +
                encodedAddress;

            const webLink =
                "https://m.uber.com/ul/?action=setPickup&dropoff[formatted_address]=" +
                encodedAddress;

            openApplication(appLink, webLink);
        });
    }

    function openApplication(appUrl, webUrl) {
        const start = Date.now();

        window.location.href = appUrl;

        setTimeout(function () {
            if (Date.now() - start < 1800) {
                window.open(webUrl, "_blank");
            }
        }, 1200);
    }
});
