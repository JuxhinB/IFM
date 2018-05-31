<?php

	include_once 'db_connection.php';
	include_once 'product_print.php';

	class item_display extends db_connection{
		
		private $item_data;
		
		function item(){
			if(isset($_POST['submit'])){
				$p_id = $_POST['id'];
				$do = "SELECT * FROM products WHERE id='$p_id'";
				$result = $this->db_enter()->query($do);
				$check = $result->num_rows;
				
                if($check>0){
                    $this->item_data = mysqli_fetch_assoc($result);
				}
			else{
				header("Location:../admin_panel/500.php");
				exit();
			}
			}
		}//method end
		function item_gallery(){
			$photos  = array($this->item_data['image_1'],$this->item_data['image_2'],$this->item_data['image_3']);
			//generic html prints
			echo "	
			<!--left bar-->
			<!--image gallery-->
			<div class='col-md-4 single-right-left '>
				<div class='grid images_3_of_2'>
					<div class='flexslider'>
						<ul class='slides'>		
					";
			
			for($i=0;$i<count($photos);$i++){
				if($photos[$i]!=null){
					//loop for each image path that would exists & print if it does
					echo "
					<li data-thumb='".$photos[$i]."'>
						<div class='thumb-image'> <img src='".$photos[$i]."' data-imagezoom='true' class='img-responsive'> </div>
					</li>
					";
				}
			}
			if(!isset($_SESSION["state"]) || $_SESSION["state"]!="user"){
				$btn='Disabled';
			}
			elseif($_SESSION["state"]=="user"){
				$btn='Enabled';
			}
			//generic html prints			
			echo "
						</ul>
						<div class='clearfix'></div>
					</div>	
				</div>
					<form class='sub-btn' action='checkout.php' method='POST'>
						<fieldset>
							<input type='hidden' name='id' value='".$this->item_data['id']."' />
							<input type='hidden' name='item_name' value='".$this->item_data['tittle']."'
							/>
							<input type='hidden' name='amount' value='".$this->item_data['price']."' />
							<input type='hidden' name='currency_code' value='USD' />
							<input type='hidden' name='return' value='' />
							<input name='submit' value='Buy Now' class='button' type='submit' ".$btn.">
					</fieldset>
					</form>
			</div>
			<!--//image gallery-->
			";
					
			
		}//method end
		function item_info(){
			//generic html prints
			echo "
			<!--right bar-->
			<div class='col-md-8 single-right-left simpleCart_shelfItem'>
				<h3>".$this->item_data['tittle']."</h3>
				<p><span class='item_price'>".$this->item_data['price']."$</span></p>
				<div class='responsive_tabs_agileits'> 
				<div id='horizontalTab'>
						<ul class='resp-tabs-list'>
							<li>Description</li>
						</ul>
					<div class='resp-tabs-container'>
					<!--/tab_one-->
					   <div class='tab1'>

							<div class='single_page_agile_its_w3ls'>
							   <p>".$this->item_data['description']."</p>
							</div>
						</div>
						
					</div>
				</div>	
			</div>
			
		      </div>
	 			<div class='clearfix'> </div>
			";
		}//method end
		function latest_posts(){
		$do = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
		$result = $this->db_enter()->query($do);
        //check db responsnse
        $check = $result->num_rows;
		
			if($check>0){
				$print = new product_print();
				for($i=0;$i<4;$i++){
				$p_row = mysqli_fetch_assoc($result);
				$info= $p_row;

				$print->printer($info);

				}//for loop end
			}//if end
			else{
				header("Location:../admin_panel/500.php");
				exit();
			}
		}//method end
	
	}//class end
?>
