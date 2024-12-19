<?php include SRC_DIR . '/header.php' ?>

<div class="container-fluid content_web text-center">
    <h1 class="text-white">Happiness is travelling</h1>
    <!-- Hạnh phúc chính là đi du lịch -->
</div>
</nav>

<?php include SRC_DIR . '/templates/auth/login.php' ?>

<main>
    <div class="container mt-4 mb-4 text-center">
        <h3 data-translate="contentflight" class="m-auto content_1">We’re truely dedicated to make your travel experience
            as much simple and fun as possible!</h3>
    </div>
    <div class="lane m-auto mb-3"></div>

    <div class="container">
        <h5 data-translate="Our mission" class="mb-3">Our mission</h5>
        <p data-translate="mission" class="pb-3">Bringing you a modern, comfortable, and connected travel experience is
            one of our highest priorities and that’s why we continuously try to improve your experience when you book
            anything with us.</p>
    </div>

    <div class="container">
        <h5 data-translate="aboutus" class="mb-3">About us</h5>
        <p data-translate="p-about-1">We sell flight tickets, cheap flight tickets of Vietnamese local airlines such as:
            Vietjet Air, Jetstar Pacific, Vietnam Airlines</p>
        <p data-translate="p-about-2">At MyFlight you can search and compare flights for free with the options of all
            available airlines at competitive price.</p>
        <p data-translate="p-about-3">Search for Domestic Flights in Vietnam and Popular Route Searches with the best
            deals only at MyFlight!</p>
    </div>



    <div class="container mt-5 mb-3">
        <h3 data-translate="whyus" class="m-auto content_1">Why us</h3>
    </div>
    <div class="lane m-auto mb-4"></div>

    <!-- Why us -->
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4 col-sm-4 col-12">
                <h1><i class="fa-solid fa-scale-balanced"></i></h1>
                <p data-translate="Price transparency commitment">Price transparency commitment</p>
            </div>
            <div class="col-lg-4 col-sm-4 col-12">
                <h1><i class="fa-solid fa-headset"></i></h1>
                <p data-translate="Professional team">Professional team</p>
            </div>
            <div class="col-lg-4 col-sm-4 col-12">
                <h1><i class="fa-solid fa-magnifying-glass"></i></h1>
                <p data-translate="The best search engine commitment">The best search engine commitment</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-6 col-sm-6 col-12">
                <h1><i class="fa-solid fa-money-bill-transfer"></i></h1>
                <p data-translate="Safe & convenient payment">Safe & convenient payment</p>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <h1><i class="fa-solid fa-ticket"></i></h1>
                <p data-translate="Ticketing 24/7">Ticketing 24/7</p>
            </div>
        </div>
    </div>
</main>
<div class="container-fluid" id="map"></div>

<?php include SRC_DIR . '/footer.php' ?>

</body>

<script>
    var mapObject = L.map("map", {
        center: [16, 108],
        zoom: 5
    });
    L.tileLayer(
        "http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}", {
            attribution: '&copy; <a href="http://' + 'www.openstreetmap.org/copyright">Google Satellite</a>'
        }
    ).addTo(mapObject);

    var url = "https://data.opendevelopmentmekong.net/geoserver/ODMekong/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ODMekong%3Aairport&outputFormat=application%2Fjson"
    $.getJSON(url, function(data) {
        L.geoJSON(data).addTo(mapObject);
    })
</script>

</html>