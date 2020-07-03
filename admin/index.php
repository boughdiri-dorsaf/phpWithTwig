<?php


require "../vendor/autoload.php";

use App\HotelController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Authentification;
    
$authentif = new Authentification();

if(!$authentif->isLoggedIn()){
    header ('Location: login.php'); 
}
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);
$hotelCtrl = new HotelController();

$page = 'hotel';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

switch ($page){
    case 'editDashboard.twig':
        $hotel = $hotelCtrl->getHotel();
        echo $twig->render('editDashboard.twig', ['hotel' => json_decode($hotel), 'actionEdit' => $hotelCtrl->editHotel()]);
        break;

    case 'addDashboard.twig':
        echo $twig->render('addDashboard.twig', ['actionAdd' => $hotelCtrl->addHotel() ]);
        break;
        
    default : 
        $hotel = $hotelCtrl->getHotel();
        echo $twig->render('index.twig', ['hotel' => json_decode($hotel)]);
        break;
        
}
?>
