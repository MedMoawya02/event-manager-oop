<?php
require_once "config/database.php";
class Joueur{
    private $db;
    private $id ,$pseudo,$role,$salaire,$idEquipe;

    public function __construct($pseudo,$role,$salaire,$idEquipe){
        $this->db=new Database("localhost","root","","eventmanager");
        $this->pseudo=$pseudo;
        $this->role=$role;
        $this->salaire=$salaire;
        $this->idEquipe=$idEquipe;
    }

    //create
    public function createJoueur(){
        $conn=$this->db->getConnection();
        $sql="INSERT INTO joueur (pseudo,role,salaire,idEquipe)VALUES('$this->pseudo','$this->role','$this->salaire','$this->idEquipe')";
        $conn->query($sql);
    }

     //list of joueurs
    public function getAll(){
        $conn=$this->db->getConnection();
        $sql="SELECT * FROM joueur";
        $result=$conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //delete club
    public function deleteJoueur($id){
        $conn=$this->db->getConnection();
        $sql="DELETE FROM joueur WHERE idJoueur='$id'";
        $conn->query($sql);
    }
}