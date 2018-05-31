        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
			<?php
			  echo "
			<p class='name'>".$_SESSION['u_fn']." ".$_SESSION['u_ln']."</p>
			  ";
				?>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="dashboard_s.php">
                <img src="images/icons/6.png" alt="">
                <span class="menu-title">Sales</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard_p.php">
                <img src="images/icons/3.png" alt="">
                <span class="menu-title">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard_u.php">
                <img src="images/icons/018-warning.png" alt="">
                <span class="menu-title">Users</span>
              </a>
            </li>
          </ul>
        </nav>