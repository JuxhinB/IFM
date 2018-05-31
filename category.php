<?php
include_once 'important/db_connection.php';
include_once 'important/product_print.php';
	

class products_grid extends db_connection{
	
	function grid(){
		$do = "SELECT * FROM products ORDER BY date_created DESC LIMIT 12";
		$result = $this->db_enter()->query($do);
        //check db responsnse
        $check = $result->num_rows;
		
		if($check>0){
			$print = new product_print();
			for($i=0;$i<12;$i++){
			$p_row = mysqli_fetch_assoc($result);
			$info= $p_row;
			
			$print->printer($info);

			}//for loop end
		}//if end
		else{
			header("Location:admin_panel/500.php");
			exit();
		}
		
	}//method end
}//class end


$call = new products_grid();
$call->grid();