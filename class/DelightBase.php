<?php
namespace App;

class DelightBase{

    public $auth;

    public function __construct(){
        try{
        
            
            $db = new \PDO('mysql:dbname=ramsam;host=localhost;charset=utf8mb4', 'root', '');
    
            $this->auth = new \Delight\Auth\Auth($db);

        } catch (Exception $e){
        
            die ("Erreur:".$e->getmessage());
        
        }
    }

}

    
?>