<?php 
require_once "../vendor/autoload.php";
use App\RoomsController;

$roomCtrl = new RoomsController();

$roomCtrl->deleteType($_GET['id']);

?>