<?php 
  include 'header.php'; require "vendor/autoload.php";
  
  use App\HotelController;
  
  $hotelController = new HotelController();

?>

    <section class="site-hero overlay" style="background-image: url(assets/img/hero_1.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Profitez d'un luxe <br> Expérience</h1>
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

    <section class="section">
      <div class="container">
      
      <h2 class="heading text-center">Bienvenue <em>à </em> RamSam.</h2>
        <div class="row align-items-center">
          <?php
            $requete = $hotelController->getHotel();
            $requete = json_decode($requete);
            foreach($requete as $rows){
            ?>
            
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2" data-aos="fade-up">
            <img src="assets/img/<?php echo $rows->img_descr; ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <p class="mb-4"><?php echo $rows->description; ?></p>
            <p><a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo btn btn-primary text-white py-2 mr-3">Voir la vidéo</a></p>
          </div>

          <?php
            }
          ?>
          
        </div>
      </div>
    </section>

    <section class="section slider-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8">
            <h2 class="heading" data-aos="fade-up">Voir la galerie</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200" style="height:50%;">
              
              <?php
            $requete = $hotelController->getHotel();
            $requete = json_decode($requete);
            foreach($requete as $rows){
            ?>
              <div class="slider-item">
                <img src="assets/img/<?php echo $rows->carousel1; ?>" height="400px" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="assets/img/<?php echo $rows->carousel2; ?>" height="400px" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="assets/img/<?php echo $rows->carousel3; ?>" height="400px" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="assets/img/<?php echo $rows->carousel4; ?>" height="400px" alt="Image placeholder" class="img-fluid">
              </div>
              <?php
            }
          ?>
            </div>
            <!-- END slider -->
          </div>

          
        </div>
      </div>
    </section>
    <!-- END section -->
    
    
    <!-- END section -->
    <section class="section testimonial-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8">
            <h2 class="heading" data-aos="fade-up">Témoignage</h2>
          </div>
        </div>


        
        <div class="row">
          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            
            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="assets/img/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;Et quidem, impedit eum fugiat excepturi iste aliquid suscipit, tempore, delectus rem soluta voluptatem distinctio sed dolores, magni fugit nemo cum expedita. Totam a accusantium sunt aut autem placeat officia.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="assets/img/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis, blanditiis laboriosam alias&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="assets/img/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;Nostrum, alias, provident magnam sit blanditiis laboriosam unde quaerat, at ipsam, ratione maiores saepe nisi modi corporis quas! Beatae quam, quod aspernatur debitis nesciunt quasi porro ea iste nobis aliquid perspiciatis nostrum culpa impedit aut, iure blanditiis itaque similique sunt!&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>


            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="assets/img/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;Et quidem, impedit eum fugiat excepturi iste aliquid suscipit, tempore, delectus rem soluta voluptatem distinctio sed dolores, magni fugit nemo cum expedita. Totam a accusantium sunt aut autem placeat officia.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="assets/img/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis, blanditiis laboriosam alias&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="assets/img/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;Nostrum, alias, provident magnam sit blanditiis laboriosam unde quaerat, at ipsam, ratione maiores saepe nisi modi corporis quas! Beatae quam, quod aspernatur debitis nesciunt quasi porro ea iste nobis aliquid perspiciatis nostrum culpa impedit aut, iure blanditiis itaque similique sunt!&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

          </div>
            <!-- END slider -->
        </div>

      </div>
    </section>
    

    
  <?php include 'footer.php' ?>