<?php 

  include 'header.php'; 
  require "vendor/autoload.php";
  
  use App\RoomsController;
  
  $typeChambre = new RoomsController();
  
?>

    <section class="site-hero inner-page overlay" style="background-image: url(assets/img/slider-1.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Chambres &amp; Suites </h1>
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

    
    <section class="section bg-light" id="next">

      <div class="container">
      
      <?php
        $requete = $typeChambre->getRooms();
        $requete = json_decode($requete);
        foreach($requete as $rows){
          if($rows->id%2 == 1){
            
      ?>
        <div class="site-block-half d-flex bg-white" data-aos="fade-up" data-aos-delay="100">
          <a href="#" class="image d-block bg-image" style="background-image: url('assets/img/<?php echo $rows->image; ?>');"></a>
          <div class="text">
            <h2><?php echo $rows->nom; ?></h2>
            <p class="lead"><?php echo $rows->description; ?></p>
            <p><a href="reservation.php?id=<?php echo  $rows->id; ?>" class="btn btn-primary text-white">Réserve maintenant</a></p>
          </div>
        </div>
      <?php
          }else{
      ?>
        <div class="site-block-half d-flex bg-white" data-aos="fade-up" data-aos-delay="200">
          <a href="#" class="image d-block bg-image order-2" style="background-image: url('assets/img/<?php echo $rows->image; ?>');"></a>
          <div class="text order-1">
            <h2><?php echo $rows->nom; ?></h2>
            <p class="lead"><?php echo $rows->description; ?></p>
            <p><a href="reservation.php?id=<?php echo  $rows->id; ?>" class="btn btn-primary text-white">Réserve maintenant</a></p>
          </div>
        </div>

        <?php
        }
      }
      ?>
        
      </div>
    </section>
  <?php include 'footer.php' ?>