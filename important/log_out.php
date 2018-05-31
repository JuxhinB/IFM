<?php
include_once 'db_connection.php';

class log_out{
    public function logout(){
       $_SESSION["state"]="guest";
        header("Location:../index.php");
        exit();
    }
}
$call = new log_out();
$call->logout();