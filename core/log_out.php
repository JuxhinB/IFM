<?php
session_start();
class log_out{
    public function reset_session(){
        $_SESSION['status'] = 0;
        $_SESSION['user_id'] = 0;
        header("Location:../public/index.php");
        exit();
    }
}
$log_out = new log_out();
$log_out->reset_session();