<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog sing-pop">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
                        <form action="important/user_log_in.php" method="POST">
							<div class="styled-input agile-styled-input-top">
							 <input value="" name="usermail" type="email" required>
							<label>E-Mail</label>
							<span></span>
							</div>
							<div class="styled-input">
							 <input value="" name="passw" type="password" required> 
							<label>Password</label>
							<span></span>
							</div> 
							 <input name="log" type="submit" value="Sign In">
						</form>
							<div class="clearfix"></div>
							<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>

<!-- sing up pop up-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog sing-pop">
		<!-- Modal content-->
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
				<div class="modal-body modal-body-sub_agile">
				<div class="col-md-12 modal_body_left modal_body_left1">
				<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
                    <form action="important/sign_up_validator.php" method="POST">
					<div class="styled-input agile-styled-input-top">
						<input required type="text" name="first_name">
						<label>FirstName</label>
						<span></span>
					</div>
                    <div class="styled-input agile-styled-input-top">
						<input required type="text" name="last_name">
						<label>Last Name</label>
						<span></span>
					</div>
					<div class="styled-input">
						<input required type="email" name="user_email"> 
						<label>E-Mail</label>
						<span></span>
					</div> 
					<div class="styled-input">
						<input required type="password" name="user_password"> 
						<label>Password</label>
						<span></span>
					</div>
					<input name="sign" type="submit" value="Sign Up">
				</form>
					<div class="clearfix"></div>
					<p><a href="#">By clicking register, I agree to your terms</a></p>
						</div>
		      <div class="clearfix"></div>
            </div>
        </div>
		
	</div>
</div>