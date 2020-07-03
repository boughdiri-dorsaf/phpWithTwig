<?php 
require_once "../vendor/autoload.php";
use App\RoomsController;

$roomCtrl = new RoomsController();

$roomCtrl->deleteRoom($_GET['id']);

?>