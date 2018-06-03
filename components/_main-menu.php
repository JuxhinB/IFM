<?php
include '../core/session.php';
$session = new session();
?>
<!-- banner -->
<div class="main_section_agile container-fluid">		
	<div class="agileits_w3layouts_banner_nav row">
		<nav class="navbar navbar-default col-12">
			<div class="navbar-header navbar-left col-3">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h1><a class="navbar-brand" href="index.php">G<i class="fa fa-futbol-o" aria-hidden="true"></i>al</a></h1>
				
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="navbar-collapse navbar-right col-12 col-sm-9" id="bs-example-navbar-collapse-1">
				<nav class="menu--iris">
					<ul class="nav navbar-nav menu__list flex-row justify-content-center">
						<li class="menu__item menu__item--current"><a href="index.php" class="menu__link">Home</a></li>
						<li class="menu__item"><a href="about.php" class="menu__link">about</a></li>
						<li class="menu__item"><a href="team.php" class="menu__link">Team</a></li>
						<li class="menu__item"><a href="testimonials.php" class="menu__link">Testimonials</a></li>
						<li class="menu__item"><a href="contact.php" class="menu__link">Contact Us</a></li>
						<li class="menu__item">
							<?php
							echo $session->menu_btn();
							?>
						</li>
					</ul>
					<div class="log-in-modal modal fade" id="log-in-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog " role="document">
							<div class="modal-content">
								<form action="../core/log_in.php" method="POST">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Log In</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<input type="email" name="email" class="form-control" required />
										<input type="password" name="password" class="form-control" required/>
									</div>
									<div class="modal-footer">
										<button type="button" data-toggle="modal" data-target="#sign-up-modal" data-dismiss="modal" class="register-here w-75">You don't have an account ? </br>
										Click here to register</button>
										<button type="button" class="my-btn-modal w-25" data-dismiss="modal">Close</button>
										<button type="submit" name="submit" class="my-btn-modal w-25">Log In</button>
										
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="sign-up-modal modal fade" id="sign-up-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog " role="document">
							<div class="modal-content">
								<form action="../core/sign_up.php" method="POST">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Sign Up</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<input type="Text" name="first-name" class="form-control" placeholder="First Name" required />
										<input type="Text" name="last-name" class="form-control" placeholder="Last Name" required />
										<input type="email" name="email" class="form-control" placeholder="E-Mail" required />
										<input type="password" name="password" class="form-control" placeholder="Password" required />
									</div>
									<div class="modal-footer">
										<button type="button" class="my-btn-modal" data-dismiss="modal">Close</button>
										<button type="submit" class="my-btn-modal">Sign Up</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</nav>
	</div>
</div>