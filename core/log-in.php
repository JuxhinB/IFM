<?php
session_start();
include_once 'db_conn.php';
include_once 'mailcheck.php';

class log_in{
    private $email;
    private $password;
    function set(){
        if(isset($_POST['submit'])){
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->fields();
        }
    }
    function fields(){
        if(empty($this->email) || empty($this->password)){
           header("Location: index.php?Fill_all the_fields!");
            exit();
        }
        else{
            $this->mail_valid();
        }
    }
    function mail_valid(){
        
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->admin_verify();
        }
        else{
            header("Location: index.php?Not_valid_EMAIL!");
            exit();
        }
    }
    function admin_verify(){
        $db_req = "SELECT * FROM admins WHERE email = '$this->email'";
        $db_result = $this->connect()->query($db_req);
        $result = $db_result->num_rows;
        if($result>0){
            $admin_data = mysqli_fetch_array($db_result);
                if($this->password==$admin_data[3]){
                    $_SESSION['open']='open';
                    header("Location: panel.php");
                    exit();
                }
            else{
                header("Location: index.php?Password_not_correct!");
                exit();
            }
        }
        else{
            header("Location: index.php?User_does_not_exists!");
            exit();
        }
    }
}

$log_in = new log_in();
$log_in->set();