<?php 



  include 'header.php'; 
  require "vendor/autoload.php";
  
  use App\ServicesController;
  
  $services = new ServicesController();
  
?>

    <section class="site-hero inner-page overlay" style="background-image: url(assets/img/slider-7.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Services</h1>
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

    
    
    <section class="section bg-light post" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row mb-5">
            <?php
              $requete = $services->getServices();
              $requete = json_decode($requete);
              foreach($requete as $rows){
                if($rows->id%2 == 1){
            ?>
              <div class="col-md-6">
                <div class="media media-custom d-block mb-4">
                  <a href="#" class="mb-4 d-block"><img src="assets/img/<?php echo $rows->image; ?>" alt="Image placeholder" class="img-fluid"></a>
                  <div class="media-body">
                  <h2 class="mt-0 mb-3"><a href="#"><?php echo $rows->nom; ?></a></h2>
                    <span style="color:#191919;"><?php echo $rows->description; ?></span>
                  </div>
                </div>
              </div>
            <?php
              }else{
            ?>
              <div class="col-md-6">
                 <div class="media media-custom d-block mb-4">
                  <a href="#" class="mb-4 d-block"><img src="assets/img/<?php echo $rows->image; ?>" alt="Image placeholder" class="img-fluid"></a>
                  <div class="media-body">
                  <h2 class="mt-0 mb-3"><a href="#"><?php echo $rows->nom; ?></a></h2>
                    <span style="color:#191919;"><?php echo $rows->description; ?></span>
                  </div>
                </div>
              </div>
            <?php
                }
              }
            ?>
            </div>

          </div>
          <!-- END content -->
          <div class="col-md-4">
            <div class="row">

              <div class="col-md-11 ml-auto">
                <div class="side-box">
                  <h2 class="heading">Equipements de la chambre</h2>
                  <ul class="post-list list-unstyled">

                    <li>
                      <a href="#" class="d-flex">
                        <span class="mr-3 "><img width="50px" src="https://image.flaticon.com/icons/svg/1242/1242930.svg" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta"></span>
                          <h3 class="mt-3 ">télévision par satellite</h3>
                        </div>
                      </a>
                    </li>  

                    <li>
                      <a href="#" class="d-flex">
                        <span class="mr-3 "><img width="50px" src="https://www.flaticon.com/premium-icon/icons/svg/2234/2234366.svg" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta"></span>
                          <h3 class="mt-3 ">sèche-cheveux</h3>
                        </div>
                      </a>
                    </li>  

                    <li>
                      <a href="#" class="d-flex">
                        <span class="mr-3 "><img width="50px" src="https://image.flaticon.com/icons/svg/34/34774.svg" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta"></span>
                          <h3 class="mt-3 ">climatisation</h3>
                        </div>
                      </a>
                    </li>  

                    <li>
                      <a href="#" class="d-flex">
                        <span class="mr-3 "><img width="50px" src="https://image.flaticon.com/icons/svg/1677/1677099.svg" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta"></span>
                          <h3 class="mt-3 ">chauffe-eau</h3>
                        </div>
                      </a>
                    </li>  

                    <li>
                      <a href="#" class="d-flex">
                        <span class="mr-3 "><img width="50px" src="https://image.flaticon.com/icons/svg/159/159599.svg" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta"></span>
                          <h3 class="mt-3 ">internet</h3>
                        </div>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="d-flex">
                        <span class="mr-3 "><img width="50px" src="https://image.flaticon.com/icons/svg/13/13936.svg" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta"></span>
                          <h3 class="mt-3 ">Téléphone dans la chambre</h3>
                        </div>
                      </a>

                      <li>
                      <a href="#" class="d-flex">
                        <span class="mr-3 "><img width="50px" src="https://image.flaticon.com/icons/svg/1065/1065413.svg" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta"></span>
                          <h3 class="mt-3 ">miroir</h3>
                        </div>
                      </a >

                   
                  </ul>
                </div>

              </div>
              

             

            </div>
            
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php' ?>