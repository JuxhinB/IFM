<?php
class mailcheck{
    public $mail ;
    public function expression_check($mail){
        $this->mail=$mail;
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $res=1;
            return $res;
        }
        else {
           $res=0;
           return $res; 
        }
    }
}
