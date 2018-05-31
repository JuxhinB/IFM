<?php
include_once '../important/db_connection.php';

class dashboard extends db_connection{
	function sales_row(){
	
	$do = "SELECT * FROM sales ORDER BY id ASC";
	$sales_result = $this->db_enter()->query($do);
	$check = $sales_result->num_rows;
	if($check>0){
		while($sales_data = mysqli_fetch_assoc($sales_result)){
			//get from sales table
			$s_id= $sales_data['id'];
			$u_id= $sales_data['user_id'];
			$p_id= $sales_data['product_id'];
			$date= $sales_data['date'];
			//get buyer from users
			$do = "SELECT * FROM users WHERE id='$u_id'";
			$result = $this->db_enter()->query($do);
			$check = $result->num_rows;
			if($check>0){
				$buyer = mysqli_fetch_assoc($result);
				$u_n= $buyer['first_name'];
				$l_n= $buyer['last_name'];
			}
			else{
				header("Location:500.php");
				exit();
			}
			//get sold product
			$do = "SELECT * FROM products WHERE id='$p_id'";
			$result = $this->db_enter()->query($do);
			$check = $result->num_rows;
			$check = $result->num_rows;
			if($check>0){
				$prd = mysqli_fetch_assoc($result);
				$p_sold= $prd['tittle'];
			}
			else{
				header("Location:500.php");
				exit();
			}
			echo "
			 <tr class=''>
				<td>".$s_id."</td>
				<td>".$u_n." ".$l_n."</td>
				<td>".$p_sold."</td>
				<td>".$date."</td>
			 </tr>
				";
		}
	}
	else{
		header("Location:500.php");
		exit();
	}
	}//sales_row end
	
	function products_row(){
		
	$do = "SELECT * FROM products ORDER BY id ASC";
	$result = $this->db_enter()->query($do);
	$check = $result->num_rows;
	if($check>0){
		while($prd_data = mysqli_fetch_assoc($result)){
			//get from products table
			$p_id= $prd_data['id'];
			$p_tittle= $prd_data['tittle'];
			$p_desc= $prd_data['description'];
			$p_price= $prd_data['price'];
			$p_category= $prd_data['category'];
			$p_sales= $prd_data['sales'];
			$date= $prd_data['date_created'];
			
	echo "

		 <tr class=''>
            <td>".$p_id."</td>
            <td>".$p_tittle."</td>
            <td>Desc</td>
            <td>$".$p_price."</td>
            <td>".$p_category."</td>
            <td>".$p_sales."</td>
			<td>".$date."</td>
			<td>
			<form action='delete.php' method='POST'>
				<input hidden name='id' value='".$p_id."' />
				<input hidden name='table' value='products' />
				<input class='del_btn' type='submit' name='delete' value='Delete' />
			</form>
			</td>
         </tr>
			";
		}
	}
	else{
		header("Location:500.php");
		exit();
	}

	}//sales_row end
	
	function users_row(){	
	$do = "SELECT * FROM users ORDER BY id ASC";
	$result = $this->db_enter()->query($do);
	$check = $result->num_rows;
	if($check>0){
		while($prd_data = mysqli_fetch_assoc($result)){
			$u_id= $prd_data['id'];
			$u_fn= $prd_data['first_name'];
			$u_ln= $prd_data['last_name'];
			$u_email= $prd_data['email'];
			$u_desc= $prd_data['description'];
	echo "
		 <tr class=''>
            <td>".$u_id."</td>
            <td>".$u_fn."</td>
			<td>".$u_ln."</td>
			<td>".$u_email."</td>
			<td>".$u_desc."</td>
			<td>
			<form action='delete.php' method='POST'>
				<input hidden name='id' value=".$u_id." />
				<input hidden name='table' value='users' />
				<input class='del_btn' type='submit' name='delete' value='Delete' />
			</form>
			</td>
         </tr>
			";
		}
	}
	else{
		header("Location:500.php");
		exit();
	}
	}//sales_row end
}//class dashboard end
