<?php
namespace App;
use \PDO;

class Database{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    public function __construct($db_name="ramsam", $db_user='root', $db_pass='', $db_host='localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }
    public function getPdo(){
        if ($this->pdo === null){
            $pdo = new PDO('mysql:host=localhost;dbname=ramsam;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
    public function query($statement){
        $req = $this->getPdo()->query($statement);
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    public function prepare($statement){
        $req = $this->getPdo()->prepare($statement);
        return $req;
    }
    
    public function lastInsertId(){
        return $this->getPdo()->lastInsertId();
    }
    
}