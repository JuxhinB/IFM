<?php
include_once 'db_connection.php';
include_once 'validator.php';

class user_log_in extends validator{
    public function query_type(){
		if (isset($_POST['log'])){
        $table = 'users';
		$user = $_POST['usermail'];
        $pass = $_POST['passw'];
        $this->verify($table,$user,$pass);
		}
    }
}

$call = new user_log_in();
$call->query_type();