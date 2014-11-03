<?php
session_start();
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Checkout - Group 4</title>

		<?php 
			include 'header.php';
			include 'includes.php';
		?>
		<div class="container">
			<div class="option">	

				<div id="form-container">
					<h3>Login to Your Account:</h3>

					<form id="loginForm" action="includes/compare.php" method="POST">
						<legend>Login</legend>
						<!-- <p id="loginError"></p> -->
						
						<?php // Login Form ?>
						<ul>
							<li>
								<label class="labelFix" for="loginUser">
									Username:
								</label>
								<input type="text" name="loginUser" id="loginUser" placeholder="Username" required/>
							</li>
							<li>
								<label class="labelFix" for="loginPass">
									Password:
								</label>
								<input size="13" type="password" name="loginPass" id="loginPass" placeholder="Password" required/>
							</li>
						</ul>

						<input type="hidden" name="login" value="true" />
						<input type="hidden" name="loghash" id="loghash"/>
						<input id="login-submit" type="submit" value="Login" class="btn btn-default complete"/>

					</form>

					<form id="signupForm" action="includes/compare.php" method="POST">

						<legend>Sign Up</legend>

						<!-- <p id="signupError"></p> -->

						<?php // Signup Form ?>
						<ul>
							<li><label class="labelFix" for="createUser">Username:</label><input type="text" id="createUser" name="createUser" placeholder="Username" required/></li>
							<li><label class="labelFix" for="createEmail">Email:</label><input type="email" id="createEmail" name="createEmail" placeholder="Email" required/></li>
							<li><label class="labelFix" for="createPass">Password:</label><input type="password" id="createPass" name="createPass" placeholder="Password" required/></li>
							<li><label class="labelFix" for="createConfirm">Confirm Password:</label><input type="password" id="createConfirm" name="createConfirm" placeholder="Password" required/></li>
						</ul>
						<input type="hidden" name="signhash" id="signhash"/>
						<input type="hidden" name="signhash2" id="signhash2"/>
						<input type="submit" name="signup" value="Sign Up" class="btn btn-default complete"/>

					</form>
				</div>

				<div id="form-success"></div>

			
			</div>
		</div>		

		<?php include 'footer.php'; ?>
		<script src="js/sha256.js"></script>
		<script src="js/login.js"></script>

		<script>

			// =- =- =- =- =- =- =-
			//	
			//	Login Form Submit
			//
			// =- =- =- =- =- =- =- =-

			$('#loginForm').on('submit', function(evt) {

				evt.preventDefault();
					
				var form = $(this),
					btn = form.find('#login-submit'),
					successMsg = $('#form-success'),
					form_container = $('#form-container');
						
				//send	
				$.ajax({
					url: 'includes/compare.php',
					type: 'POST',
					data: form.serialize(),
					success: function(result) {
						console.log(result);

										
						var data = result;
						
						// The ajax response returns data.code = 0 if the login failed
						if( data.code && data.code == 0 ) {
							successMsg.html(data.message);
						}
						
						// The ajax response returns data.code = 1 if the login was successful
						if( data.code && data.code == 1 ) {
							
							form.find('input[type=text], texarea').val('').trigger('blur');
							form_container.slideUp();
							successMsg.html(data.message);
					
						}
						
					}
				});
				
				return false;
					
			});

		</script>
		
	</body>
</html>