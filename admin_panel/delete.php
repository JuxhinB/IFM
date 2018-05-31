<?php
include_once '../important/validator.php';
class delete extends db_connection{
	function remove_user(){
		if (isset($_POST['delete'])){
			$id = $_POST['id'];
			$table = $_POST['table'];
			
		$do="DELETE FROM $table WHERE id='$id'";
		$this->db_enter()->query($do);
		
		if($table=='users'){
			$name='User';
			$return='dashboard_u.php';
		}
		elseif($table=='products'){
			$name='Product';
			$return='dashboard_p.php';
		}
		echo "
	<div class='jumbotron'>
		<h1 class='display-3'>Procces Done!</h1>
		<h2>".$name." Removed From Database!</h2>
		<p class='lead'>
			<a class='btn btn-primary btn-sm' href='".$return."' role='button'>Continue</a>
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
	$call = new delete();
	$call->remove_user();
?>

        <!-- partial -->
      </div>
    </div>

  </div><?php
				include 'footer.php'
	?>
</body>

</html>