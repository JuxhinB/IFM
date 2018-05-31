<?php
include_once '../important/db_connection.php';

class new_prd extends db_connection{
	function add_prd(){
		if (isset($_POST['submit'])){
			$tittle = $_POST['tittle'];
			$dsc = $_POST['description'];
			$c_p = $_POST['cover_photo'];
			$p1 = $_POST['1_photo'];
			$p2 = $_POST['2_photo'];
			$p3 = $_POST['3_photo'];
			$price = $_POST['price'];
			$category = $_POST['category'];
		$do="INSERT INTO products(id, tittle, description, cover_photo, image_1, image_2, image_3, date_created, price, category, sales) VALUES ('','$tittle','$dsc','$c_p','$p1','$p2','$p3',now(),'$price','$category','')";
			
		$this->db_enter()->query($do);
			
			
		echo "
	<div class='jumbotron'>
		<h1 class='display-3'>Thank You!</h1>
		<h2>Product Added To Database</h2>
		<p class='lead'>
			<a class='btn btn-primary btn-sm' href='dashboard_p.php' role='button'>Continue </a>
		</p>
	</div>
		
		";
		}
	
	}//method end
}//class end

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Thank You! | Web Sector</title>
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css" />
	  <link rel="stylesheet" href="css/admin_style.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="" />
</head>

<body>
<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->

		  
		  
<?php
	include 'menu.php';
	?>
        <!-- partial -->
	<div class="content-wrapper">
    <h3 class="page-heading mb-4">Dashboard</h3>
			
<?php
	$call = new new_prd();
	$call->add_prd();
?>

        <!-- partial -->
      </div>
    </div>

  </div><?php
				include 'footer.php'
	?>
</body>

</html>