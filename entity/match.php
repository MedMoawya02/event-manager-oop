<?php
require_once "config/database.php";
class Mmatch{
    private $db;
    private $scoreA,$scoreB,$equipeA,$equipeB,$idTournoi,$idGagnant;

    public function __construct($equipeA=null,$equipeB=null,$idTournoi=null){
        $this->db=new Database("localhost","root","","eventmanager");
     /*    $this->scoreA=$scoreA;
        $this->scoreB=$scoreB; */
        $this->equipeA=$equipeA;
        $this->equipeB=$equipeB;
        $this->idTournoi=$idTournoi;

    }

    //create
    public function createMatch(){
        $conn=$this->db->getConnection();
            /* $sql="INSERT INTO mmatch (score_A,score_B,equipeA,equipeB,idTournoi,idGagnant)VALUES('$this->scoreA','$this->scoreB','$this->equipeA','$this->equipeB','$this->idTournoi','$this->equipeA')"; */
            $sql="INSERT INTO mmatch (equipeA,equipeB,idTournoi)VALUES('$this->equipeA','$this->equipeB','$this->idTournoi')";
            $conn->query($sql);
    }

    //
    public function addScore($id,$scoreA,$scoreB){
        $conn=$this->db->getConnection();
        $sql="SELECT * FROM mmatch WHERE idMatch='$id'";
        $result=$conn->query($sql);
        $match=$result->fetch_assoc();
        if($scoreA>$scoreB){
            $idGagnant=$match['equipeA'];
        }else{
            $idGagnant=$match['equipeB'];
        }
        
            $sql="UPDATE mmatch SET score_A='$scoreA',
            score_B='$scoreB' , idGagnant='$idGagnant' WHERE idMatch='$id';
        ";
        $conn->query($sql);        
    }

    //
    public function deleteMatch($id){
        $conn=$this->db->getConnection();
        $sql="DELETE FROM mmatch WHERE idMatch='$id'";
        $conn->query($sql);
    }

    //get nbr of matches
    public function getNbr(){
        $conn=$this->db->getConnection();
        $sql="SELECT COUNT(idMatch)AS total_matches FROM mmatch";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        return $row['total_matches'];
    }

    //nombre des matches pour chaque tournoi
    public function getTournoiMatches(){
        $conn=$this->db->getConnection();
        $sql="SELECT titre ,COUNT(idMatch) AS total_matches FROM tournoi 
            INNER JOIN mmatch ON tournoi.idTournoi=mmatch.idTournoi
            GROUP BY tournoi.idTournoi
        ";
        $result=$conn->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
}