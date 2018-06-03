<?php 
class db_conn{

    private $db_path;
    private $db_user;
    private $db_pass;
    private $db_name;

    private $conn;

    protected function connect(){
        $this->db_path='localhost';
        $this->db_user='root';
        $this->db_pass='';
        $this->db_name='goal';
        
        $this->conn = new mysqli($this->db_path,$this->db_user,$this->db_pass,$this->db_name);
    }
    public function getConn(){
        $this->connect();
        return $this->conn;
    }
}