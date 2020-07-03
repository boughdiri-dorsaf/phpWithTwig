<?php
require_once "../vendor/autoload.php";
use App\Authentification;

$authentif= new Authentification();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="http://localhost/ramsam/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="http://localhost/ramsam/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Creer un Compte!</h1>
              </div>
              <form class="user" method="post" action="<?php $authentif->register(); ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="username"  placeholder="Username">                  
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit">Register</button>
                             
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Mot de passe Oublié?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="http://localhost/ramsam/assets/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/ramsam/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="http://localhost/ramsam/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="http://localhost/ramsam/assets/js/sb-admin-2.min.js"></script>

</body>

</html>