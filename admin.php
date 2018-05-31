<!DOCTYPE html>
<html lang="en">

<head>
 
 <!-- Required meta tags -->
  <meta charset="utf-8">
 
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
 <title>Admin | Web Sector</title>
 
 <link rel="stylesheet" href="admin_panel/node_modules/font-awesome/css/font-awesome.min.css" />
  
<link rel="stylesheet" href="admin_panel/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  
<link rel="stylesheet" href="admin_panel/css/style.css" />
  
<link rel="shortcut icon" href="admin_panel/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="admin_panel/admin_log_in.php" method="POST">
                <div class="form-group">
                  <input name="usermail" value="" type="email" class="form-control p_input" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="passw" value="" type="password" class="form-control p_input" placeholder="Password">
                </div>
                <div class="text-center">
                  <button name="log" type="submit" class="btn btn-primary btn-block enter-btn">LOG IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../../js/misc.js"></script>
</body>

</html>
