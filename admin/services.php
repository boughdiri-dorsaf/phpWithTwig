<?php


require "../vendor/autoload.php";

use App\ServicesController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Authentification;
    
$authentif = new Authentification();

if(!$authentif->isLoggedIn()){
    header ('Location: login.php'); 
}
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);
$serviceCtrl = new ServicesController();

$page = 'rooms';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

switch ($page){
    case 'services.twig':
        $services = $serviceCtrl->getServices();
        echo $twig->render('services.twig', ['services' => json_decode($services)]);
        break;

    case 'addService.twig':
        echo $twig->render('addService.twig', ['actionAdd' => $serviceCtrl->addService() ]);
        break;

    case 'editService.twig':
        $service = $serviceCtrl->getService($_GET['id']);
        $service = json_decode($service);
        echo $twig->render('editService.twig', ['actionEdit' => $serviceCtrl->editService($_GET['id']), 'service' => $service ]);
        break;
        
    default : 
        $services = $serviceCtrl->getServices();
        echo $twig->render('services.twig', ['services' => json_decode($services)]);
        break;

    
}
        
?>