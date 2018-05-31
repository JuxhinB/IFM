<?php
include_once 'db_connection.php';

class payment_form extends db_connection{
	
	function payment(){
		if(isset($_POST['submit'])){
		
		$item_id = $_POST['id'];
		
		$do = "SELECT * FROM products WHERE id='$item_id'";
        //query with the method from the connection class
        $result = $this->db_enter()->query($do);
        //check db responsnse
        $check = $result->num_rows;
        
        //check user already exists
        if($check>0){
            $item = mysqli_fetch_assoc($result);
			
		echo "

				<div id='info'>
				  <img id='product' src=".$item['image_1'].">
				  <p>".$item['tittle']."</p>
				  <div id='price'>
					<h2>$".$item['price']."</h2>
				  </div>
				</div>

				<div id='payment'>

				 <form action='thank_you.php' method='POST' id='checkout'>
				 
				 
				 	<input name='id' value='".$item['id']."' type='text' hidden>
					
					
					<input class='card' id='visa' name='card' value='' type='button'>
					<input class='card' id='mastercard' name='card' value='' type='button'>

					<label>Credit Card Number</label>
					<input id='cardnumber' pattern='[0-9]{13,16}' name='cardnumber' requierd='true' placeholder='0123-4567-8901-2345' type='text'>

					<label>Card Holder</label>
				   	<input id='cardholder' name='name' requierd='true' maxlength='50' placeholder='Cardholder' type='text'>

					<label>Expiration Date</label>
					<label id='cvc-label'>CVC/CVV</label>
					<div id='left'>
						<select name='month' id='month' onchange='' size='1'>
						  <option value='00'>MM</option>
						  <option value='01'>01</option>
						  <option value='02'>02</option>
						  <option value='03'>03</option>
						  <option value='04'>04</option>
						  <option value='05'>05</option>
						  <option value='06'>06</option>
						  <option value='07'>07</option>
						  <option value='08'>08</option>
						  <option value='09'>09</option>
						  <option value='10'>10</option>
						  <option value='11'>11</option>
						  <option value='12'>12</option>
						</select>
					<p>/</p>
						<select name='year' id='year' onchange='' size='1'>
						  <option value='00'>YY</option>
						  <option value='01'>16</option>
						  <option value='02'>17</option>
						  <option value='03'>18</option>
						  <option value='04'>19</option>
						  <option value='05'>20</option>
						  <option value='06'>21</option>
						  <option value='07'>22</option>
						  <option value='08'>23</option>
						  <option value='09'>24</option>
						  <option value='10'>25</option>
						</select>
					</div>
					<input id='cvc' placeholder='Cvc/Cvv' maxlength='3' type='text'>

					<input class='btn' name='purchase' value='Purchase' type='submit'>
				  </form>
				</div>
			";
		}
		else{
				header("Location:../admin_panel/500.php");
				exit();
			}
	
		}//if end
		
	}//method end
}//class end


$call = new payment_form();
$call->payment();