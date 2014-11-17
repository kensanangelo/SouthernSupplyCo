<?php
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Checkout - Group 4</title>

		<?php 

			include 'includes.php';
			include 'header.php';

			if(isset($_GET['mode'])){
				$mode = $_GET['mode'];
				// if($mode == 'logout'){
				// 	unset($_SESSION['logged_in']);
				// 	unset($_SESSION['user_id']);
				// 	$_SESSION['user_access'] = 1;
				// }
				
			}else{
				$mode='';
			}
			

		?>
		<div class="marB-20"></div>
		<div class="container">
			<div class="option">	
				
						<h3>Login to Your Account:</h3>

						<div id="form-success"></div>
					<div id="form-container">
						

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
							<input type="hidden" name="signup" />
							<input type="submit" value="Sign Up" class="btn btn-default complete"/>

						</form>
					</div>


			
			</div>
		</div>		

		<?php include 'footer.php'; ?>
		<script src="js/sha256.js"></script>
		<script src="js/login.js"></script>
		
	</body>
</html>