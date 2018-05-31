<?php
include_once '../important/validator.php';

class admin_log_in extends validator{
    public function query_type(){
		if (isset($_POST['log'])){
        $table = 'admins';
		$user = $_POST['usermail'];
        $pass = $_POST['passw'];
        $this->verify($table,$user,$pass);
		}
    }
}

$call = new admin_log_in();
$call->query_type();

?>
