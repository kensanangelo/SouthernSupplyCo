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
				<h3>Complete Your Purchase</h3>
				<form action="http://sulley.cah.ucf.edu/~ke571033/dig4530c/assignments/ia03/cart.php">
					<fieldset>
    					<legend>Your Details</legend>
    					<ul>
							<li><label class="labelFix" for="name">Name:</label><input type="text" id="name" placeholder="First and Last Name"/></li>
							<li><label class="labelFix" for="phone">Phone #:</label><input size="13" type="text" id="phone" placeholder="(555)555-5555"/></li>
							<li><label class="labelFix" for="email">Email:</label><input type="text" id="email" placeholder="example@sample.com"/></li>						</ul>
					</fieldset>
					<fieldset>
    					<legend>Shipping Information</legend>
    					<ul>
							<li><label class="labelFix" for="line1">Address Line 1:</label><input type="text" id="line1" placeholder="555 Sample Ave."/></li>
							<li><label class="labelFix" for="line2">Address Line 2:</label><input type="text" id="line2" placeholder="Apt. 555"/></li>
							<li><label class="labelFix" for="city">City:</label><input type="text" id="city" placeholder="Example City"/></li>
							<li><label class="labelFix" for="state">State:</label><input size="2" type="text" id="state" placeholder="FL"/></li>
							<li><label class="labelFix" for="zip">Zip Code:</label><input size="5" type="text" id="zip" placeholder="55555"/></li>
						</ul>
					</fieldset>
					<fieldset>
    					<legend>Card Details</legend>
    					<ul>
							<li>
								<fieldset id="card">
									<legend>Card Type</legend>
									<ul>
										<li><input type="radio" name="creditType" value="visa" id="visa"/><label for="visa">Visa</label></li>
										<li><input type="radio" name="creditType" value="mastercard" id="mastercard"/><label for="mastercard">Mastercard</label></li>
										<li><input type="radio" name="creditType" value="discover" id="discover"/><label for="discover">Discover</label></li>
									</ul>
								</fieldset>
							</li>
							<li><label class="labelFix" for="cardNum">Card Number:</label><input size="17" type="text" id="cardNum" placeholder="XXX-XXXX-XXXX-XXX"/></li>
							<li><label class="labelFix" for="code">Security Code:</label><input size="3" type="text" id="code" placeholder="XXX"/></li>
							<li><label class="labelFix" for="nameCard">Name on Card:</label><input type="text" id="nameCard" placeholder="Firstname M. Lastname"/></li>
							<li><label class="labelFix" for="expir">Expiration Date:</label><input size="5" type="text" id="expir" placeholder="XX/XX"/></li>
						</ul>
					</fieldset>
					<input type="submit" value="Complete Purchase" class="btn btn-default complete"/>
				</form>
			</div>
		</div>		

		<?php include 'footer.php'; ?>

	</body>
</html>