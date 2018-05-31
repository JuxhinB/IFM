<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Error | Web Sector</title>
  <link rel="stylesheet" href="../css/style_adm.css" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center text-center error-page">
          <div class="col-lg-6 mx-auto">
            <h1 class="display-1 mb-0">500!</h1>
            <h2 class="mb-4">Internal server error!</h2>
			  <?php
            	if(!isset($_SESSION["state"]) || $_SESSION["state"]!="user"){
					echo "<a class='btn btn-primary mt-5 btn-rounded btn-lg' href='../index.php'>Back To Home</a>";
				}
		
				elseif($_SESSION["state"]=="user"){
					echo "<a class='btn btn-primary mt-5 btn-rounded btn-lg' href='admin_log_in.php'>Back To Home</a>";
				}
				?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
