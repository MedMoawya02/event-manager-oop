<?php
require_once "config/database.php";
class Tournoi{
    private $db;
    private $idTournoi,$titre,$cashprize,$format;
    public function __construct($titre,$cashprize,$format){
        $this->db=new Database("localhost","root","","eventmanager");
        $this->titre=$titre;
        $this->cashprize=$cashprize;
        $this->format=$format;
    }

    //create
    public function createTournoi(){
        $conn=$this->db->getConnection();
        $sql="INSERT INTO tournoi (titre,cashprize,format)VALUES('$this->titre','$this->cashprize','$this->format')";
        $conn->query($sql);
    }

     //list of tournoi
    public function getAllTournoi(){
        $conn=$this->db->getConnection();
        $sql="SELECT * FROM tournoi";
        $result=$conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //delete club
    public function deleteTournoi($id){
        $conn=$this->db->getConnection();
        $sql="DELETE FROM tournoi WHERE idToutnoi='$id'";
        $conn->query($sql);
    }
}