<?php include SRC_DIR . '/header.php' ?>

<div class="container-fluid content_web text-center">
    <h1 class="text-white">Contact us</h1>
</div>
</nav>

<?php include SRC_DIR . '/templates/auth/login.php' ?>

<main>
    <div class="container mt-4 mb-4">
        <h3 class="m-auto content_1">Sends us a Message</h3>
    </div>
    <div class="lane m-auto mb-4"></div>

    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <input type="text" class="form-control" id="colFormLabelSm" placeholder="Name">
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="colFormLabelSm" placeholder="Email">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <textarea class="form-control form-control-lg" rows="5" placeholder="Message"></textarea>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-3"><button class="btn btn-primary">Send Message</button></div>
        </div>

        <iframe src="https://maps.google.com/maps?q=T%C3%A2n%20k%E1%BB%B3%20T%C3%A2n%20Qu%C3%BD&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" class="mb-5" width="100%" height="500" frameborder="0" style="border:0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

    </div>
</main>

<?php include SRC_DIR . '/footer.php' ?>

</body>

</html>