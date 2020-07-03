<?php
  $page = $_SERVER['REQUEST_URI'];
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Ramsam Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    
    <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    


    <!-- Theme Style -->
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

  <header class="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 site-logo" data-aos="fade"><a href="index.php"><em>Ramsam</em></a></div>
          <div class="col-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->
            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto text-center">
                      <ul class="list-unstyled menu">
                      <li <?php if($page=="/projetJihen/index.php") { ?>  class="active"   <?php   }  ?>>
                          <a href="index.php">Acceuil</a>
                        </li>
                        <li <?php if($page=="/projetJihen/rooms.php") { echo 'class="active"'; }?>>
                          <a href="rooms.php">Chambres &amp; Suites </a>
                        </li>
                        <li <?php if($page=="/projetJihen/restaurants-bars.php") { ?> class="active" <?php } ?>>
                          <a href="restaurants-bars.php">Restaurants & Bars</a>
                        </li>
                        <li <?php if($page=="/projetJihen/services.php") { ?> class="active" <?php } ?>>
                          <a href="services.php">Services</a>
                        </li>
                        <!--<li>
                            <a href="blog.php">Events</a>
                          </li>
                        -->
                        <li <?php if($page=="/projetJihen/contact.php") { ?> class="active" <?php } ?>>
                          <a href="contact.php">Contact</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->
