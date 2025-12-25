<?php
require_once "config/database.php";
class Mmatch{
    private $db;
    private $scoreA,$scoreB,$equipeA,$equipeB,$idTournoi,$idGagnant;

    public function __construct($equipeA,$equipeB,$idTournoi){
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
}