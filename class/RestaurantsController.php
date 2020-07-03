<?php 
namespace App;
use App\Database;

class RestaurantsController {

    private $db; // Instance de PDO
    
    public function __construct()
    {
        $this->db = new Database();
    }  

    public function getRestaurants(){

        $restaurants = $this->db->query('SELECT * FROM restaurants ORDER BY id DESC');
        $restaurants = json_encode($restaurants);
        return $restaurants;

    }

    public function getRestaurant($id){
        $restaurant = $this->db->query('SELECT * FROM restaurants WHERE id ='.$id);
        $restaurant = json_encode($restaurant);
        return $restaurant;
    }

    public function addRestaurant(){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 

            $sql = "INSERT INTO restaurants (nom,image, description) values(?,?, ?)";
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_nom'],$_POST['f_image'], html_entity_decode($_POST['f_description'])));
            header("Location: restaurants.php?page=restaurants.twig");
        }

    }

    public function editRestaurant($id){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 
            
            $sql = "UPDATE restaurants SET nom=?, image =?, description = ? WHERE id =".$id;                                                                                                                                                                              
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_nom'],$_POST['f_image'], html_entity_decode($_POST['f_description'])));
            header("Location: restaurants.php?page=restaurants.twig");

        }

    }

    public function deleteRestaurant($id){

        if(!empty($id)){

            $stmt = $this->db->prepare("DELETE FROM rooms WHERE id = ?");
            $stmt->execute([$id]);
            header("Location: restaurants.php?page=restaurants.twig");

        }

    }


}

?>