<?php
session_start();
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Client Account – Group 4</title>

		<?php 
			include 'header.php';
			include 'includes.php';
		?>
		<div class="container">
		<h1 class="marB-20">Account Information</h1>
			<div class="option">
				<div class="row">
					<div class="col-md-3">
							<img class='img-responsive' src="img/profile.jpg" alt="Profile Image">
					</div>
					<div class="col-md-5">
						<h3>Bob Stevenson</h3>

						<h4>Bob's Construction Company</h4>
						<div class="row marT-20">
							<div class="col-md-6"><span class="emph">Member since:</span><br/> 01/17/2008</div>
							<div class="col-md-6"><span class="emph">Contact Phone Number:</span><br/> 1 (863) 555-3579</div>
						</div>
						<div class="row marT-20">
							<div class="col-md-6"><span class="emph">Payment Info:</span><br/>Visa Card<br/>XXX-XXXX-XXXX-1093</div>
							<div class="col-md-6"><span class="emph">Address:</span><br/>817 Appalachia Ave.<br/>Arkansas City, KS 67005</div>
						</div>
					</div>
					<div class="col-md-4 marT-20 text-right">
						<p><span class="emph">Account #:</span> 1897354</p>
						<a href="cart.php" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Cart</a>
					
					</div>
				</div>
			</div>
		</div>		

		<?php include 'footer.php'; ?>

	</body>
</html>