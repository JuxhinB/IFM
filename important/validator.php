<?php
include_once 'db_connection.php';
include_once 'mailcheck.php';
class validator extends db_connection {
    private $table;
	private $user;
	private $pass;
    protected function verify($table,$user,$pass){
		//db table name
        $this->table = $table;
        //assign form input variables
        $this->user = $user;
        $this->pass = $pass;
		
        //create instance to access mailcheck class
        $exec = new mailcheck();
        //assign the value of what is returned , 1 or 0
        $exp_check = $exec->expression_check($user);
            
		if($table=='users'){
			$path='index.php';
		}
		else{
			$path='admin_panel/admin.php';
		}
		
            //in case one of the fields is empty
            if(empty($user) || empty($pass)){
                header("Location: ../$path?Please_fill_in_all_the_fields_!");
                exit();
            }
            //in case email is not in order
            elseif ($exp_check==0) {
                header("Location: ../$path?Email_not_typed_correctly_!");
                exit();
            }
            //if all ok start connection to db
            else{
                $do = "SELECT * FROM $table WHERE email='$user'";
                //query with the method from the connection class
                $result = $this->db_enter()->query($do);
                //check db responsnse
                $check = $result->num_rows;
                
                //check user already exists
                if($check>0){
                    $u_data = mysqli_fetch_assoc($result);
                    //check if password matches
                    if ($pass==$u_data["password"]){
                        //save information in another place in order not to access it again for db
						$_SESSION["u_id"]=$u_data["id"];
						$_SESSION["u_fn"]=$u_data["first_name"];
						$_SESSION["u_ln"]=$u_data["last_name"];
                        //if password matches open the 
						if($table=='users'){
							$_SESSION["state"]="user";
							header("Location: ../$path");
                        	exit();
						}
						elseif($table=='admins'){
							$_SESSION["state"]="admin";
							header("Location: ../admin_panel/dashboard_s.php");
                        	exit();
						}

                    }
                    //alert if password doesn't matches
                    else{
                        header("Location: ../$path?Wrong_Password");
                        exit();
                    }
                }
                //alert if user does not exists
                else{
                    header("Location: ../$path?User_Does_Not_Exists_!");
                    exit();
                }
            }
        
    }
}