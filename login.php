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
				<h3>Login to Your Account:</h3>
				<form id="loginForm" action="includes/compare.php" method="POST">
					<legend>Login</legend>
					<p id="loginError"></p>
					<ul>
						<li><label class="labelFix" for="loginUser">Username:</label><input type="text" name="loginUser" id="loginUser" placeholder="Username" required/></li>
						<li><label class="labelFix" for="loginPass">Password:</label><input size="13" type="text" name="loginPass" id="loginPass" placeholder="Password" required/></li>
					</ul>
					<input type="submit" name="login" value="Login" class="btn btn-default complete"/>
				</form>
				<form id="signupForm" action="includes/compare.php" method="POST">
					<legend>Sign Up</legend>
					<p id="signupError"></p>
					<ul>
						<li><label class="labelFix" for="createUser">Username:</label><input type="text" id="createUser" name="createUser" placeholder="Username" required/></li>
						<li><label class="labelFix" for="createEmail">Email:</label><input type="text" id="createEmail" name="createEmail" placeholder="Email" required/></li>
						<li><label class="labelFix" for="createPass">Password:</label><input type="text" id="createPass" name="createPass" placeholder="Password" required/></li>
						<li><label class="labelFix" for="createConfirm">Confirm Password:</label><input type="text" id="createConfirm" name="createConfirm" placeholder="Password" required/></li>
					</ul>
					<input type="submit" name="signup" value="Sign Up" class="btn btn-default complete"/>
				</form>
			
			</div>
		</div>		

		<?php include 'footer.php'; ?>
		<script src="js/login.js"></script>
		
	</body>
</html>