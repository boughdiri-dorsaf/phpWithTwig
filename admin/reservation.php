<?php


require "../vendor/autoload.php";

use App\ReservationController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Authentification;
    
$authentif = new Authentification();

if(!$authentif->isLoggedIn()){
    header ('Location: login.php'); 
}
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);
$reervCtrl = new ReservationController();

$reservations = $reervCtrl->getReservations();
echo $twig->render('reservations.twig', ['reservations' => json_decode($reservations)]);
        
?>