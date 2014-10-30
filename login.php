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
				<form action="includes/compare.php" method="POST">
					<fieldset>
    					<legend>Login</legend>
    					<ul>
							<li><label class="labelFix" for="name">Username:</label><input type="text" name="username" id="name" placeholder="Username"/></li>
							<li><label class="labelFix" for="phone">Password:</label><input size="13" type="text" name="password" id="phone" placeholder="Password"/></li>
						</ul>
						<input type="submit" name="login" value="Login" class="btn btn-default complete"/>
					</fieldset>
					<fieldset>
    					<legend>Sign Up</legend>
    					<ul>
							<li><label class="labelFix" for="line1">Username:</label><input type="text" id="line1" placeholder="Username"/></li>
							<li><label class="labelFix" for="line2">Email:</label><input type="text" id="line2" placeholder="Email"/></li>
							<li><label class="labelFix" for="line3">Password:</label><input type="text" id="line3" placeholder="Password"/></li>
							<li><label class="labelFix" for="line4">Confirm Password:</label><input type="text" id="line4" placeholder="Password"/></li>
						</ul>
						<input type="submit" name="signup" value="Sign Up" class="btn btn-default complete"/>
					</fieldset>
				</form>
			</div>
		</div>		

		<?php include 'footer.php'; ?>
		
	</body>
</html>