<?php
include 'db_conn.php';

class manager {

    public function add_field(){
        session_start();
        $user_id = $_SESSION['user_id'];
        $location = $_POST['location'];
        $category = $_POST['category'];
        $do = "INSERT INTO fields (manager,location,category,date_created) VALUES('$user_id','$location','$category',now())";
        $db_conn = new db_conn();
        $db_conn->getConn()->query($do);
        header('Location:../public/profile.php');
        exit();
    }
    public function display_fields(){
        $user_id = $_SESSION['user_id'];
        $db_req = "SELECT * FROM fields WHERE manager = '$user_id'";
        $db_conn = new db_conn();
        $db_result = $db_conn->getConn()->query($db_req);
        $field = '';
        while($field_id = mysqli_fetch_assoc($db_result)){
            $field .= "
                <li class='list-group-item row d-flex justify-content-between p-2'>
                    <span class='badge badge-dark col-3 d-flex flex-column justify-content-center p-2 m-1'>".$field_id['field_id']."</span>
                    <span class='badge badge-secondary col-3 d-flex flex-column justify-content-center p-2 m-1'>".$field_id['location']."</span>
                    <span class='badge badge-dark col-3 d-flex flex-column justify-content-center p-2 m-1'>".$field_id['category']."</span>
                    <form class='col-2' action='/IFM/core/manager.php' method='POST'>
                    <input hidden name='id' value=".$field_id['field_id']." />
                        <button type='submit' name='delete_field' class='btn btn-warning float-right'>
                            Delete
                        </button>
                    </form>
                </li>";
        }
        return $field;
        exit();
    }
    public function delete_field(){
        $db_conn = new db_conn();
        $id = $_POST['id'];
        $do = "DELETE FROM fields WHERE field_id = '$id'";
        $db_conn->getConn()->query($do);
        header('Location:../public/profile.php');
        exit();
    }
}

$manager = new manager();
if(isset($_POST['add_field'])){
    $manager->add_field();
}
if(isset($_POST['delete_field'])){
    $manager->delete_field();
}