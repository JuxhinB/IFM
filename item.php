<?php
	include_once 'important/single_page.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Item | Web Sector</title>
<!--/tags -->
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<script type='application/x-javascript'> addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1);
</script>
<!-- //tags -->
<link href='css/bootstrap.css' rel='stylesheet' type='text/css' media='all' />
<link rel='stylesheet' href='css/flexslider.css' type='text/css' media='screen' />
<link href='css/font-awesome.css' rel='stylesheet'> 
<link href='css/easy-responsive-tabs.css' rel='stylesheet' type='text/css'/>
<link href='css/style.css' rel='stylesheet' type='text/css' media='all' />
<link href="css/custom.css" rel="stylesheet" type="text/css" />
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800' rel='stylesheet'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- sing in or sing up options -->
<?php 
	include 'top_btn.php';
	include 'tittle.php';
	include 'menu.php';
	?>
	<div class='banner-bootom-w3-agileits'>
		<div class='container'>
		<?php 	
		$call = new item_display();
		$call->item();
		$call->item_gallery();
		$call->item_info();
		?>
			<div class="w3_agile_latest_arrivals">
				<h3 class="wthree_text_info">Featured <span>Templates</span></h3>	
				<?php 
				$call->latest_posts();
				?>
				<div class="clearfix"> </div>
			</div>
		</div>
	 </div>	
<?php 
	include 'pop_windows.php';
	include 'footer.php';
	?>

<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


<script type='text/javascript' src='js/jquery-2.1.4.min.js'></script>
<!-- //js -->
<script src='js/modernizr.custom.js'></script>
<!-- Custom-JavaScript-File-Links --> 
<!-- cart-js -->
<script src='js/minicart.min.js'></script>
<!-- single -->
<script src='js/imagezoom.js'></script>
<!-- single -->
<!-- script for responsive tabs -->						
<script src='js/easy-responsive-tabs.js'></script>
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
<!-- FlexSlider -->
<script src='js/jquery.flexslider.js'></script>
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	$('.flexslider').flexslider({
	animation: 'slide',
	controlNav: 'thumbnails'
	});
	});
</script>
<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
<!-- start-smoth-scrolling -->
<script type='text/javascript' src='js/move-top.js'></script>
<script type='text/javascript' src='js/jquery.easing.min.js'></script>
<script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('.scroll').click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
<script type='text/javascript'>
		$(document).ready(function() {				
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type='text/javascript' src='js/bootstrap.js'></script>
</body>
</html>
