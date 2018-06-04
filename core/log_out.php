<?php
session_start();
class log_out{
    public function logout(){
        $_SESSION['status'] = 0;
        $_SESSION['user_id'] = 0;
        header("Location:../public/index.php");
        exit();
    }
}
$call = new log_out();
$call->logout();