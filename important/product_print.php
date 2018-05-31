<?php
class product_print{
	
	public $info;
	public $cover;
	public $id;
	public $tittle;
	public $price;
	function printer($info){
		
		$this->info=$info;
		$this->id=$info['id'];
		$this->cover=$info['cover_photo'];
		$this->tittle=$info['tittle'];
		$this->price=$info['price'];
		
		if(!isset($_SESSION["state"]) || $_SESSION["state"]!="user"){
			$btn='Disabled';
        }
        elseif($_SESSION["state"]=="user"){
			$btn='Enabled';
        }
		
		echo "
		<div class='col-xs-6 col-md-3 product-men'>
			<div class='men-pro-item simpleCart_shelfItem'>
				<div class='men-thumb-item'>
					<img src='".$this->cover."'alt='' class='pro-image-front'>
					<img src='".$this->cover."'alt='' class='pro-image-back'>
						<div class='men-cart-pro'>
							<div class='inner-men-cart-pro'>
							
							<form action='item.php' method='POST'>
							<input type='hidden' name='id' value='".$this->id."' />
							<input type='submit' name='submit' value='Quick View' class='link-product-add-cart'/>
							</form action='item.php' method='POST'>
							
							</div>
						</div>				
				</div>
				
			<div class='item-info-product'>
				<h4>
					<a href='#'>".$this->tittle."</a>
				</h4>
				<div class='info-product-price'>
					<span class='item_price'>".$this->price."$</span>
				</div>
				
				<div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2'>

					<form action='checkout.php' method='POST'>
						<fieldset>
							<input type='hidden' name='id' value='".$this->id."' />
							<input type='hidden' name='item_name' value='".$this->tittle."'
							/>
							<input type='hidden' name='amount' value='".$this->price."' />
							<input type='hidden' name='currency_code' value='USD' />
							<input type='hidden' name='return' value='' />
							<input name='submit' value='Buy Now' class='button' type='submit' ".$btn.">
						</fieldset>
					</form>
			
				</div>
			</div>
</div>
</div>

	";
	}//method end
}//class end