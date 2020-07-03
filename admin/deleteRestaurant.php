<?php 
require_once "../vendor/autoload.php";
use App\RestaurantsController;

$restoCtrl = new RestaurantsController();

$roomCtrl->deleteRestaurant($_GET['id']);

?>