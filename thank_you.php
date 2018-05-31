<?php
include_once'important/db_connection.php';
include_once'important/validator.php';

class payment_proccess extends db_connection{
	function payment_submition(){
		
		if(isset($_POST['purchase'])){
		
		$user_id=$_SESSION["u_id"];
		$item_id = $_POST['id'];
			
			
		$do = "SELECT * FROM products WHERE id='$item_id'";
        $result = $this->db_enter()->query($do);
		$p_id = mysqli_fetch_assoc($result);
		$prd = $p_id['sales'];
		$prd++;
		
		$do = "INSERT INTO sales(id, user_id, product_id, date) VALUES ('','$user_id','$item_id',now())";
        //query with the method from the connection class
        $this->db_enter()->query($do);
			
			
		$do = "UPDATE products SET sales='$prd' WHERE id='$item_id'";
        //query with the method from the connection class
        $this->db_enter()->query($do);
		
		}
		
	}//method end
}//class end


$call = new payment_proccess();
$call->payment_submition();
?>

<!DOCTYPE html>
<html>
<head>
<title>School Project</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="css/custom.css" rel="stylesheet" type="text/css" />
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
	
	<?php 
	include 'top_btn.php';
	include 'tittle.php';
	include 'menu.php';
	include 'pop_windows.php';
	?>
<div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You!</h1>
	<h2>Payment Complete!</h2>
  	<p class="lead"><strong>Please check your email</strong> for further instructions.</p>
  <hr>
  
  	<p class="lead">
    	<a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
	</p>
	</div>
<?php 	
	include 'footer.php';
	?>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
		$(document).ready(function() {		
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
