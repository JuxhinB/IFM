<?php
session_start();

class session {
    private $btn;
    private $status;

    public function set_session($status){
        //1 for admin
        //2 for player
        //3 for manager
        $this->status = $status;
        $_SESSION['status'] = $status;
    }

    public function menu_btn (){
        if(!isset($_SESSION['status'])){
            $this->btn = 
                "<button type='button' class='menu__link my-btn' data-toggle='modal' data-target='#log-in-modal'>
                    <i class='fa fa-user'></i> Profile
                </button>";
            return $this->btn; 
        }
        else{
            if($_SESSION['status']==1 || $_SESSION['status']==2 || $_SESSION['status']==3){
                $this->btn = 
                    "<a class='menu__link my-btn' href='profile.php'>
                        <i class='fa fa-user'></i> Profile
                    </a>";
                return $this->btn;
            }
        }
    }

    public function profile_sidebar(){

    }
}