<?php 
	require_once "../vendor/autoload.php";

	use App\Authentification;

	$authentif = new Authentification();
	$authentif->verifEmail($_GET['selector'], $_GET['token']);
?>