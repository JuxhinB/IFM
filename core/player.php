<?php
include 'db_conn.php';

class player{
    public function team(){
        
        $db_conn = new db_conn();
        $user_id = $_SESSION['user_id'];
        $db_req = "SELECT * FROM users WHERE id = '$user_id'";
        $db_result = $db_conn->getConn()->query($db_req);
        $result = $db_result->num_rows;
        if($result>0){

        }
    }
}