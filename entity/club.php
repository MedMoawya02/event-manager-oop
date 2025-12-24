<?php
require_once "config/database.php";
class Club{
    public $db;
    public $id,$nom;

    public function __construct(){
        $this->db=new Database("localhost","root","","eventmanager");
    }
    //create
    public function create(){
        $conn=$this->db->getConnection();
        $sql="INSERT INTO club (nom)VALUES ('$this->nom')";
        $conn->query($sql);
    }
    //list of clubs
    public function getAll(){
        $conn=$this->db->getConnection();
        $sql="SELECT * FROM club";
        $result=$conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //delete club
    public function delete($id){
        $conn=$this->db->getConnection();
        $sql="DELETE FROM club WHERE idClub='$id'";
        $conn->query($sql);
    }

    //modifier un club 
    public function update($id,$newName){
        $conn=$this->db->getConnection();
        $sql="UPDATE  club set nom='$newName' WHERE idClub='$id'";
        $conn->query($sql);
    }
}