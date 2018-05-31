<?php
session_start();

class db_connection{
    private $serverDB;
    private $usernameDB;
    private $passwordDB;
    private $nameDB;
    
    protected function db_enter(){
        $this->serverDB = 'localhost';
        $this->usernameDB = 'user1';
        $this->passwordDB = 'dMQURJIWsHcBRriy';
        $this->nameDB = 'web_sector';
        
        $ok = new mysqli($this->serverDB, $this->usernameDB, $this->passwordDB, $this->nameDB);
        
        return $ok;
    }
}