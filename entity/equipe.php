<?php
require_once"config/database.php";
class Equipe{
    private $db;
    private $id,$nom,$jeu,$idClub;
    
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function getJeu(){
        return $this->jeu;
    }
    public function setJeu($jeu){
        $this->jeu=$jeu;
    }
    public function getIdClub(){
        return $this->idClub;
    }
    public function setIdClub($idClub){
        $this->idClub=$idClub;
    }
    //la connexion avec database
    public function __construct(){
        $this->db=new Database("localhost","root","","eventmanager");
    }
    //create 
    public function createEquipe(){
        $conn=$this->db->getConnection();
        $sql="INSERT INTO equipe (nom,jeu,idClub)VALUES('$this->nom','$this->jeu','$this->idClub')";
        $conn->query($sql);
    }

    public function __tostring(){
        return  "Equipe : " .$this->nom;
    }

}