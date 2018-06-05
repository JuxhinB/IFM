<?php
include 'db_conn.php';

class player{
    public function team(){
        $db_conn = new db_conn();
        $user_id = $_SESSION['user_id'];
        $db_req = "SELECT * FROM users WHERE id = '$user_id'";
        $db_result = $db_conn->getConn()->query($db_req);
        $player_info = mysqli_fetch_assoc($db_result);
        if($player_info['team']==null){    
            return 'You currently are not part of any team.';
        }
    }
}