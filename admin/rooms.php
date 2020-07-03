<?php


require "../vendor/autoload.php";

use App\RoomsController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Authentification;
    
$authentif = new Authentification();

if(!$authentif->isLoggedIn()){
    header ('Location: login.php'); 
}

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);
$roomCtrl = new RoomsController();

$page = 'rooms';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

switch ($page){
    case 'rooms.twig':
        $rooms = $roomCtrl->getRooms();
        echo $twig->render('rooms.twig', ['rooms' => json_decode($rooms)]);
        break;

    case 'addRoom.twig':
        $types = $roomCtrl->getTypes();
        $types = json_decode($types,true);
        echo $twig->render('addRoom.twig', ['actionAdd' => $roomCtrl->addRoom(), 'types' => $types ]);
        break;

    case 'editRoom.twig':
        $types = $roomCtrl->getTypes();
        $types = json_decode($types,true);
        $room = $roomCtrl->getRoom($_GET['id']);
        echo $twig->render('editRoom.twig', ['actionEdit' => $roomCtrl->editRoom($_GET['id']), 'types' => $types, 'rooms' => $room ]);
        break;

    case 'types.twig':
        $types = $roomCtrl->getTypes();
        echo $twig->render('types.twig', ['types' => json_decode($types)]);
        break;

    case 'addType.twig':
        echo $twig->render('addType.twig', ['actionAdd' => $roomCtrl->addType() ]);
        break;

    case 'editType.twig':
        $type = $roomCtrl->getType($_GET['id']);
        $type = json_decode($type,true);
        echo $twig->render('editType.twig', ['actionEdit' => $roomCtrl->editType($_GET['id']), 'type' => $type ]);
        break;
        
    default : 
      $rooms = $roomCtrl->getRooms();
      echo $twig->render('rooms.twig', ['rooms' => json_decode($rooms)]);
      break;

    
}
        
?>