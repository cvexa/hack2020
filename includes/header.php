<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Е-чакалня</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="assets/css/slick.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!--====== PRELOADER PART START ======-->

<div class="preloader">
    <div class="loader">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== PRELOADER PART ENDS ======-->

<!--====== NAVBAR TWO PART START ======-->

<section class="navbar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">

                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo.svg" alt="Logo">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item"><a class="page-scroll" href="index.php">Начало</a></li>
                            <li class="nav-item"><a class="page-scroll" href="#" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Влез с код</a></li>
                        </ul>
                    </div>

                    <div class="navbar-btn d-none d-sm-inline-block">
                        <ul>
                            <li><a class="solid" href="login.php">Вход</a></li>
                        </ul>
                    </div>
                </nav> <!-- navbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== NAVBAR TWO PART ENDS ======-->


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p class="text-center"><input type="text" placeholder="Въведи код"></p>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary">влез</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
