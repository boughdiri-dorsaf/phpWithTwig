<?php 
  include 'header.php'; 
  require "vendor/autoload.php";
?> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<?php
  use App\ContactController;
  
  $contactFront = new ContactController();
  
  if(isset($_POST['valider'])){
    $date = date('Y-m-d');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];
    $contactFront->ajouterDemande($date, $name, $email, $tel , $sujet , $message );
    echo "<script>
    swal('Félicitations!', ',Votre message a été envoyé!', 'success');
      </script>";
  }
?>
  <section class="site-hero inner-page overlay" style="background-image: url(assets/img/slider-2.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">CONTACTEZ NOUS</h1>
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

    
    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="contact.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Nom</label>
                  <input type="text" name="name" class="form-control ">
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">Telephone</label>
                  <input type="number" name="phone" class="form-control ">
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control " required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="sujet">Sujet</label>
                  <input name="sujet" name="sujet" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Message</label>
                  <textarea name="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Envoyer" name="valider"class="btn btn-primary">
                </div>
              </div>
            </form>

          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span>46 Avenue Habib Bourguiba Béja</span></p>
                <p><span class="d-block">Telephone:</span> <span> (+216)  78 451 737</span></p>
                <p><span class="d-block">Facebook:</span> <span>https://www.facebook.com/RamSamHotel/</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
<?php include 'footer.php' ?>

