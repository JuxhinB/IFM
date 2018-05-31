<div class="header" id="home">
	<div class="container">
            <ul class="sing-in-up">
                <?php
                
                if(!isset($_SESSION["state"]) || $_SESSION["state"]!="user"){
                    echo "<li> <a href='#' data-toggle='modal' data-target='#myModal'><i class='fa fa-unlock-alt' aria-hidden='true'></i> Sign In </a></li>
		              <li> <a href='#' data-toggle='modal' data-target='#myModal2'><i class='fa fa-pencil-square-o' aria-hidden='true''></i> Sign Up </a></li>";
                }
                elseif($_SESSION["state"]=="user"){
                    echo "<li> <a href='important/log_out.php'><i class='fa fa-unlock-alt' aria-hidden='true''></i> Log Out </a></li>";
                }
                
                ?>
		
		</ul>
	</div>
</div>