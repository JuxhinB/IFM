<?php
include_once '../important/validator.php';
include_once 'panels.php';

$call = new dashboard();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Product Dashboard | Web Sector</title>
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css" />
<link rel="stylesheet" href="css/admin_style.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
		  
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
		  
		<a class="log_out" href="../important/log_out.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Log Out </a>
		  
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
			<div class="add_prd_btn" id="add_prd_btn">
			<p>Add Product</p>
			</div>
			 <div class="add_prd" id="add_prd">
		  <form action="new_prd.php" method="POST">
				
			  <input type="text" name="tittle" value="" class="nu_field" required placeholder="Tittle" />
				
			  <input type="text" name="description" value="" class="nu_field" required placeholder="Description(<1200 Letters)" />
				
			  <input type="text" name="cover_photo" value="" class="nu_field" required placeholder="File Path" />
				
			  <input type="text" name="1_photo" value="" class="nu_field" placeholder="File Path(Optional)" />
				
			  <input type="text" name="2_photo" value="" class="nu_field" placeholder="File Path(Optional)" />
			  
			  <input type="text" name="3_photo" value="" class="nu_field" placeholder="File Path(Optional)" />
			  	
			  <input type="number" name="price" value="" class="nu_field" placeholder="Price" />
			  	
			  <input type="text" name="category" value="" class="nu_field" placeholder="Category Name"/>
			  
			  <input type="submit" name="submit" class="nu_field" value="Add Product" />
			</form>
		  </div>
			
          <div class="card-deck">
            <div class="card col-lg-12 px-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Sales</h5>
                <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr class="text-primary">
                        <th>ID</th>
                        <th>Tittle</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
						<th>Sales</th>
                        <th>Date Posted</th>
						<th></th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
						if(($_SESSION["state"]) =="admin"){
							$call->products_row();
						}

						else{
							//header("Location: ../admin.php");
                        	//exit();
							echo"<script>window.location.replace('../admin.php');</script>";
						}
						?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial:partials/_footer.html -->
<?php
	include 'footer.php'
	?>

        <!-- partial -->
      </div>
    </div>

  </div>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/maps.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
