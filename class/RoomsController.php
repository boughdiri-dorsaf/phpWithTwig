<?php 
namespace App;
use App\Database;

class RoomsController {

    private $db; // Instance de PDO
    
    public function __construct()
    {
        $this->db = new Database();
    }  
    public function getRooms(){

        $rooms = $this->db->query('SELECT * FROM rooms ORDER BY id DESC');
        $rooms = json_encode($rooms);
        return $rooms;
    }

    public function getRoom($id){
        $room = $this->db->query('SELECT * FROM rooms WHERE id ='.$id);
        $rooms = json_encode($room);
        return $room;
    }

    public function addRoom(){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 

            $sql = "INSERT INTO rooms (nom, type,image, description) values(?,?, ?,?)";
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_nom'],$_POST['f_type'],$_POST['f_image'], html_entity_decode($_POST['f_description'])));
            header("Location: rooms.php");
        }

    }

    public function editRoom($id){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 
            
            $sql = "UPDATE rooms SET nom=?, type= ?,image =?, description = ? WHERE id =".$id;                                                                                                                                                                              
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_nom'],$_POST['f_type'],$_POST['f_image'], html_entity_decode($_POST['f_description'])));
            header("Location: rooms.php");

        }

    }

    public function deleteRoom($id){

        if(!empty($id)){

            $stmt = $this->db->prepare("DELETE FROM rooms WHERE id = ?");
            $stmt->execute([$id]);
            header("Location: rooms.php?page=rooms.twig");

        }

    }

    public function getTypes(){
        $types = $this->db->query('SELECT * FROM type_room');
        $types = json_encode($types);
        return $types;
    }

    public function getType($id){
        $type = $this->db->query('SELECT * FROM type_room WHERE id ='.$id);
        $type = json_encode($type);
        return $type;
    }

    public function addType(){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 

            $sql = "INSERT INTO type_room (type) values(?)";
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_type']));
            header("Location: rooms.php?page=types.twig");
        }

    }

    public function editType($id){

        if($_SERVER["REQUEST_METHOD"]== "POST"){ 
            
            $sql = "UPDATE type_room SET type=? WHERE id =".$id;                                                                                                                                                                              
            $bdd = $this->db->prepare($sql);
            $bdd->execute(array($_POST['f_type']));
            header("Location: rooms.php?page=types.twig");

        }

    }

    public function deleteType($id){

        if(!empty($id)){

            $stmt = $this->db->prepare("DELETE FROM type_room WHERE id = ?");
            $stmt->execute([$id]);
            header("Location: rooms.php?page=rooms.twig");

        }

    }

}


?>