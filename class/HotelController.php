<?php 
namespace App;
use App\Database;

class HotelController {

    private $db; // Instance de PDO
    
    public function __construct()
    {
        $this->db = new Database();
    }  

    public function getHotel(){

        $hotel = $this->db->query('SELECT * FROM hotel');
        $hotel = json_encode($hotel);
        return $hotel;
    }

    public function addHotel(){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 

            $sql = "INSERT INTO hotel (description,img_descr, carousel1, carousel2, carousel3, carousel4) values(?,?,?,?,?,?)";
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_description'],$_POST['f_image'],$_POST['f_image1'],$_POST['f_image2'],$_POST['f_image3'],$_POST['f_image4']));
            header("Location: index.php");
        }

    }

    public function editHotel(){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 
            
            $sql = "UPDATE hotel SET description=?, img_descr =?, carousel1 = ?, carousel2 = ?, carousel3 = ?, carousel4 = ?";                                                                                                                                                                              
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_description'],$_POST['f_image'],$_POST['f_image1'],$_POST['f_image2'],$_POST['f_image3'],$_POST['f_image4']));
            header("Location: index.php");

        }

    }

}

?>