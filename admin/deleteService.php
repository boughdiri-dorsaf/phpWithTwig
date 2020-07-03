<?php 
require_once "../vendor/autoload.php";
use App\ServicesController;

$serviceCtrl = new ServicesController();

$serviceCtrl->deleteService($_GET['id']);

?>