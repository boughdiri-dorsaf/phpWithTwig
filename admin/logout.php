
<?php

require_once "../vendor/autoload.php";

    use App\Authentification;
    session_start();
	
    $authentif = new Authentification();
    $authentif->logout();
?>