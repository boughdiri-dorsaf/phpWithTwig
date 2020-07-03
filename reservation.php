<?php 

  include 'header.php'; 
  require "vendor/autoload.php";
  
  use App\RoomsController;
  
  $typeChambre = new RoomsController();

  if($_GET['id'] == null)
  header("Location: rooms.php");

  if(isset($_POST['reserver'])){
    $nom = $_POST['nom'];
    $tel = $_POST['phone'];
    $mail = $_POST['email'];

    $object = new stdClass();
    $object->nom = $nom;
    $object->tel = $tel;
    $object->email = $mail;
    
   //var_dump($object);


   //$startDate = strtotime($_POST['startDate']);
   //$endDate = strtotime($_POST['endDate']);
   //echo "<script>alert(".$startDate.");</script>";
  }


?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <section class="site-hero inner-page overlay" style="background-image: url(assets/img/slider-5.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center text-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Reservation</h1>
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
            <img src="assets/img/1.jpg" alt="Image placeholder" class="rounded-circle mx-auto" width="100%">
          </div>
          <br>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                
                <?php
                  $requete = $typeChambre->getRoom($_GET['id']);
                  //$requete = json_decode($requete);
                  foreach ($requete as $rows) {
                ?>
                <p>Description:</p>
                <p><span class="d-block"><?php echo strip_tags($rows->description); ?></span></p>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
<br>

        <div class="row">
          <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">   
            <form class="bg-white p-md-5 p-4 mb-5 border" name="form-detail-reserv" id="form-detail-reserv" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="name">Nom</label>
                  <input type="text" placeholder="Nom &amp; Prénom" class="form-control" name="nom" id="nom" required="">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone">Téléphone</label>
                  <input type="tel" pattern="[0-9]{8}" placeholder="ex. 54879852" class="form-control" name="phone" id="phone" required="">
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email" placeholder="E-mail" class="form-control" name="email" id="email" required="">
                </div>
                
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Date d'arrivée - Date Départ</label>
                  <input type="text" class="form-control" name="daterange" id="daterangepicker-reservation" required="">
                </div>
                <label id="msgDisponiblite"></label>
              </div>
            <br>

            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-5">
                    <h4 class="blue-text text-left margin-top-30"><u>Chambres</u></h4>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1">
                    <button id="addRoom" class="btn btn-success text-left margin-top-30"><i class="fa fa-user-plus" aria-hidden="true"></i></button>                                                    
                </div>
            </div>
            
              <div class="row col-md-12 mt-5">
                <div class="col-md-2 form-group">
                  <label for="adults" class="font-weight-bold text-black">Adultes</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="nbrAdultes0" onchange="changePriceWithAdultes(this.id, 10)" class="form-control" required>
                      <option value="0">0</option>
                      <option value="1" selected>1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label for="children" class="font-weight-bold text-black">Enfants</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" class="form-control" required id="nbrEnfants0" onchange="changePriceWithEnfants(this.id, 10)">
                      <option value="0" selected>0</option>
                      <option value="1" >1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2 form-group" required>
                  <label for="children" class="font-weight-bold text-black">Bébé(s)</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" class="form-control" id="nbrBebes0">
                      <option value="0" selected>0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2 form-group" required>
                  <label for="children" class="font-weight-bold text-black">Arrangements</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select class="form-control form-online arrangement" id="arrg0" searchable="Arrangement" onchange="changePrice(this.id, 4)">
                     
                    </select>
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <label for="children" class="font-weight-bold text-black">Prix</label>
                  <div class="field-icon-wrap">
                    <input type="text" class="form-control" disabled="true" id="price0" >
                    
                  </div>
                </div>
                
              </div>

              <div class="clearfix"></div>
              <div class="row" id="rooms"></div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group" style="text-align: left">
                <h4 id="total-price" class="visible-md visible-lg">&nbsp;&nbsp;<b>Total : </b></h4>
                </div>
                <div class="col-md-6 form-group" style="text-align: right">
                  <input type="submit" id="ReservHotel" name="reserver" value="Réservez maintenant" class="btn btn-primary text-white py-3 px-5">
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </section>
    
 <section class="section border-top">
      <div class="container" >
        <div class="row align-items-center">
          <div class="col-md-6" data-aos="fade-up">
            <h2>Mettez-vous à l'aise dans l'une de nos chambres entièrement climatisées</h2>
          </div>
          <div class="col-md-6 text-right" data-aos="fade-up" data-aos-delay="200">
            <a href="" id="ReservHotel" class="btn btn-primary py-3 text-white px-5">Réservez maintenant</a>
          </div>
        </div>
      </div>
    </section>
<footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Help</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Our Location</a></li>
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@yourdomain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Abonnez-vous a notre Newsletter</p>
            <form action="#" class="footer-newsletter" name="form-detail-reserv" id="form-detail-reserv" method="post">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your email...">
                <button type="submit" class="btn" ><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row bordertop pt-5">
          <p class="col-md-6 text-left">
            
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    
    
    <script src="assets/js/aos.js"></script>
    
    <script src="assets/js/bootstrap-datepicker.js"></script> 
    <script src="assets/js/jquery.timepicker.min.js"></script> 
    

    <script src="assets/js/main.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Confirmation de suppresion
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer cette chambre ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger btn-ok" onclick="deleteRoom()">Supprimer</a>
                    </div>
                </div>
            </div>
</div>


          

 
 
</body>
</html>