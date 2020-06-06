<?php
require_once 'db/pdo.php';
session_start()
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap first, then CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="footer.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Title -->
    <title>E-Commerce blabla</title>
</head>

<body>
<?php
include "navbar.php";
?>
    <!-- Caraousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/images/cover5.jpg" class="d-block w-100" alt="...">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Go faster, go stronger, never stop.</h1>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/images/cover18.jpg" class="d-block w-100" alt="...">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h1>The journey begins <br> with the perfect pair.</h1>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/images/cover16.jpg" class="d-block w-100" alt="...">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>Feel the earth beneath your feet.</h1>
                </div>
            </div>
        </div>
    </div>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <!-- End Caraousel -->
    
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">First, <span class="text-muted">you should login to buy some product</span></h2>
            <p class="lead">If you haven't registered any account yet, then go to register page first.</p>
        </div>
        <div class="col-md-5">
            <img src="assets/images/login-icon.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Second, <span class="text-muted">find some product you like</span></h2>
            <p class="lead">Go to product page and you will find better deals for what you need. If you’re looking for a specific product, try to use the search engine. </p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="assets/images/buy-icon.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, <span class="text-muted">checkout and pay</span></h2>
            <p class="lead">After you pay your off your shoes, the transaction note will be send to you.</p>
        </div>
        <div class="col-md-5">
            <img src="assets/images/payment-icon.jpg" class="d-block w-100" alt="...">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->
<?php
include "footer.php";
?>
</body>

</html>