<?php
namespace App;
use App\Database;


	class ContactController
	{
		private $db;
    
        public function __construct()
        {
            $this->db = new Database();
        }  

        public function ajouterDemande($date, $name, $email, $tel , $sujet , $message )
		{
            
            $requete = $this->db->prepare('INSERT INTO contacts VALUES (:id,:date,:nom,:mail,:tel,:sujet , :message )');
            $requete ->execute(array(
                'id'=>null,
                'date'=>$date,
                'nom'=>$name, 
                'mail'=>$email, 
                'tel'=>$tel , 
                'sujet'=>$sujet , 
                'message'=>$message 
            ));

            return $requete;
        }

        public function getDemandes()
		{
            $contacts = $this->db->query('SELECT * FROM contacts');
            $contacts = json_encode($contacts);
            return $contacts;
        }
        


	}


?>