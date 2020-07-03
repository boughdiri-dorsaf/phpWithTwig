<?php 


  include 'header.php'; 
  require "vendor/autoload.php";
  
  use App\RestaurantsController;

  $restaurant = new RestaurantsController();
  
?>

    <section class="site-hero inner-page overlay" style="background-image: url(assets/img/slider-4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Restaurants & Bars</h1>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <div class="container section"  id="next">
        <div class="row">
        <?php
        $requete = $restaurant->getRestaurants();
        $requete = json_decode($requete);
        foreach($requete as $rows){
          if($rows->id%2 == 1){
            
      ?>
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="block-2">
            <div class="flipper">
              <div class="front" style="background-image: url(assets/img/<?php echo $rows->image; ?>);">
                <div class="box">
                  <h2><?php echo $rows->nom; ?></h2>
                  <p></p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;<?php echo $rows->description; ?>&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="name align-self-center"><?php echo $rows->nom; ?><span class="position"></span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>
        <?php
          }else{
      ?>
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="block-2 hover">
            <div class="flipper">
              <div class="front" style="background-image: url(assets/img/<?php echo $rows->image; ?>);">
                <div class="box">
                  <h2><?php echo $rows->nom; ?></h2>
                </div>
              </div>
              <div class="back">
                <blockquote>
                  <p>&ldquo;<?php echo $rows->description; ?>&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="assets/img/<?php echo $rows->image; ?>" alt="">
                  </div>
                  <div class="name align-self-center"><?php echo $rows->nom; ?><span class="position"></span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>
        <?php
        }
      }
      ?>
      </div>
    </div>
    <!-- END .block-2 -->      
  <?php include 'footer.php' ?>