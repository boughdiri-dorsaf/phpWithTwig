<?php 
namespace App;
use App\Database;

class ServicesController {

    private $db; // Instance de PDO
    
    public function __construct()
    {
        $this->db = new Database();
    }  

    public function getServices(){

        $services = $this->db->query('SELECT * FROM services');
        $services = json_encode($services);
        return $services;

    }

    public function getService($id){
        $service = $this->db->query('SELECT * FROM services WHERE id ='.$id);
        $service = json_encode($service);
        return $service;
    }

    public function addService(){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 

            $sql = "INSERT INTO services (nom,image, description) values(?,?, ?)";
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_nom'],$_POST['f_image'], html_entity_decode($_POST['f_description'])));
            header("Location: services.php?page=services.twig");
        }

    }

    public function editService($id){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 
            
            $sql = "UPDATE services SET nom=?, image =?, description = ? WHERE id =".$id;                                                                                                                                                                              
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_nom'],$_POST['f_image'], html_entity_decode($_POST['f_description'])));
            header("Location: services.php?page=services.twig");

        }

    }

    public function deleteService($id){

        if(!empty($id)){

            $stmt = $this->db->prepare("DELETE FROM services WHERE id = ?");
            $stmt->execute([$id]);
            header("Location: services.php?page=services.twig");

        }

    }


}

?>