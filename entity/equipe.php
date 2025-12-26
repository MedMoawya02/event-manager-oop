<?php
require_once"config/database.php";
class Equipe{
    private $db;
    private $id,$nom,$jeu,$idClub;
    
    //la connexion avec database
    public function __construct($nom=null,$jeu=null,$idClub=null){
        $this->db=new Database("localhost","root","","eventmanager");
        $this->nom=$nom;
        $this->jeu=$jeu;
        $this->idClub=$idClub;
    }
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
    
    //create 
    public function createEquipe(){
        $conn=$this->db->getConnection();
        $sql="INSERT INTO equipe (nom,jeu,idClub)VALUES('$this->nom','$this->jeu','$this->idClub')";
        $conn->query($sql);
    }
    //get equipes
    public function getEquipes(){
        $conn=$this->db->getConnection();
        $sql="SELECT * FROM equipe";
        $result=$conn->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function __tostring(){
        return  "Equipe : " .$this->nom;
    }

    //nbr joueur pour chaque equipe
    public function nbrJoueurs(){
        $conn=$this->db->getConnection();
        $sql="SELECT nom ,COUNT(joueur.idJoueur) AS nbr_joueurs FROM equipe 
            LEFT JOIN joueur ON equipe.idEquipe=joueur.idEquipe 
            GROUP BY equipe.idEquipe;
        ";
        $result=$conn->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

}