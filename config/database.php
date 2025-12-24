<?php
class Database{
    public $servernName;
    public $userName;
    public $password;
    public $db;

    public function __construct($servernName,$userName,$password,$db){
        $this->servernName=$servernName;
        $this->userName=$userName;
        $this->password=$password;
        $this->db=$db;
    }

    //connection
    public function getConnection(){
        return new mysqli($this->servernName,$this->userName,$this->password,$this->db);
    }
}