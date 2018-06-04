<?php
session_start();
include_once 'db_conn.php';
include_once 'mailcheck.php';
include_once 'session.php';

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
           header("Location: ../public/index.php?Fill_all the_fields!");
            exit();
        }
        else{
            $this->mail_valid();
        }
    }
    function mail_valid(){
        $exec = new mailcheck();
        $exp_check = $exec->expression_check($this->email);
        if($exp_check){
            $this->admin_verify();
        }
        else{
            header("Location: ../public/index.php?Not_valid_EMAIL!");
            exit();
        }
    }
    function admin_verify(){
        $db_req = "SELECT * FROM users WHERE email = '$this->email'";
        $db_conn = new db_conn();
        $db_result = $db_conn->getConn()->query($db_req);
        $result = $db_result->num_rows;
        if($result>0){
            $user_data = mysqli_fetch_assoc($db_result);
                if($this->password==$user_data['password']){
                    $status = $user_data['status'];
                    $user_id = $user_data['id'];
                    $session = new session();
                    $session->set_session($status,$user_id);
                    header("Location: ../public/profile.php");
                    exit();
                }
            else{
                header("Location: ../public/index.php?Password_not_correct!");
                exit();
            }
        }
        else{
            header("Location: ../public/index.php?User_does_not_exists!");
            exit();
        }
    }
}

$log_in = new log_in();
$log_in->set();