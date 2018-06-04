<?php
include 'db_conn.php';
class manager {
    public function add_field(){
        $user_id = $_SESSION['user_id'];
        $location = $_POST['location'];
        $category = $_POST['category'];
        $db_conn = new db_conn();
        $db_req = "SELECT * FROM fields WHERE manager = '$user_id'";
        $db_result = $db_conn->getConn()->query($db_req);
        $result = $db_result->num_rows;
        $result++;
        $user_data = mysqli_fetch_assoc($db_result);
        $do = "INSERT INTO fields (field_id,manager,location,category,date_created) VALUES('$result','$user_id','$location','$category',now())";
        $db_conn->getConn()->query($do);
        header('Location:../public/profile.php');
        exit();
    }
    public function display_fields(){
        $user_id = $_SESSION['user_id'];
        $db_conn = new db_conn();
        $db_req = "SELECT * FROM fields WHERE manager = '$user_id'";
        $db_result = $db_conn->getConn()->query($db_req);
        $field = '';
        while($field_id = mysqli_fetch_assoc($db_result)){
            $field .= "<li class='list-group-item'>".$field_id['field_id']."</li>";
        }
        return $field;
        exit();
    }
}
if(isset($_POST['add_field'])){
    $manager = new manager();
    $manager->add_field();
}