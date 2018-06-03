<?php
session_start();

class session {
    private $btn;

    public function menu_btn (){
        if(!isset($_SESSION["state"]) || $_SESSION["state"]!="user"){
            $this->btn = 
                "<button type='button' class='menu__link my-btn' data-toggle='modal' data-target='#log-in-modal'>
                    <i class='fa fa-user'></i> Profile
                </button>";
            return $this->btn;    
        }
        elseif($_SESSION["state"]=="user"){
            $this->btn = 
                "<a class='menu__link my-btn' href='profile.php'>
                    <i class='fa fa-user'></i> Profile
                </a>";
            return $this->btn;
        }
    }
    public function profile_sidebar(){
        
    }
}