<?php


require "../vendor/autoload.php";

use App\ContactController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Authentification;
    
$authentif = new Authentification();

if(!$authentif->isLoggedIn()){
    header ('Location: login.php'); 
}
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);
$contactCtrl = new ContactController();

$page = 'rooms';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

switch ($page){
    case 'contacts.twig':
        $contacts = $contactCtrl->getDemandes();
        echo $twig->render('contacts.twig', ['contacts' => json_decode($contacts)]);
        break;
        
    default : 
        $contacts = $contactCtrl->getDemandes();
        echo $twig->render('contacts.twig', ['contacts' => json_decode($contacts)]);
        break;

    
}
        
?>