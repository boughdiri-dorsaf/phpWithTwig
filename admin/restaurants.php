<?php


require "../vendor/autoload.php";

use App\RestaurantsController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Authentification;
    
$authentif = new Authentification();

if(!$authentif->isLoggedIn()){
    header ('Location: login.php'); 
}
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);
$restoCtrl = new RestaurantsController();

$page = 'rooms';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

switch ($page){
    case 'restaurants.twig':
        $restaurants = $restoCtrl->getRestaurants();
        echo $twig->render('restaurants.twig', ['restaurants' => json_decode($restaurants)]);
        break;

    case 'addRestaurant.twig':
        echo $twig->render('addRestaurant.twig', ['actionAdd' => $restoCtrl->addRestaurant() ]);
        break;

    case 'editRestaurant.twig':
        $restaurants = $restoCtrl->getRestaurant($_GET['id']);
        $restaurants = json_decode($restaurants);
        echo $twig->render('editRestaurant.twig', ['actionEdit' => $restoCtrl->editRestaurant($_GET['id']), 'restaurants' => $restaurants ]);
        break;
        
    default : 
        $restaurants = $restoCtrl->getRestaurants();
        echo $twig->render('restaurants.twig', ['restaurants' => json_decode($restaurants)]);
        break;

    
}
        
?>