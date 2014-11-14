<?php
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Client Account – Group 4</title>

		<?php 
			include 'includes.php';
			include 'header.php';
		?>
		<?php if(isset($_GET['user_id'])){ ?>

			<?php 
				$user_id = $_GET['user_id'];
				$query = "SELECT * FROM users WHERE id=${user_id}";
				$user_data = mysqli_fetch_assoc($connection->query($query));

			?>
			<div id="push-down"></div>
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="home.php">Home</a></li>
					<?php if($user_data['first_name']){ ?>
						<li class="active"><?php echo $user_data['first_name']; ?></li>
					<?php } else { ?>
						<li class="active">User: <?php echo $user_id; ?></li>
					<?php } ?>
				</ol>
				<h1 class="marB-20">Account Information</h1>
				<div class="option">
					<div class="row">
						<!-- 
							We have no Profile images, not sure what to put here
						<div class="col-md-3">
								<img class='img-responsive' src="img/profile.jpg" alt="Profile Image">
						</div> -->
						<div class="col-md-5">
							<?php if ($user_data['first_name'] && $user_data['last_name'])  { ?>
								<h3><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></h3>
							<?php } else if($user_data['first_name']) { ?>
								<h3><?php echo $user_data['first_name']; ?></h3>
							<?php } else if($user_data['last_name']){ ?>
								<h3><?php echo $user_data['last_name']; ?></h3>
							<?php } else { ?>
								<h3>No Name Provided</h3>
							<?php } ?>
							

							<h4>Bob's Construction Company</h4>
							<div class="row marT-20">
								<div class="col-md-6"><span class="emph">Member since:</span><br/> 01/17/2008</div>
								<div class="col-md-6"><span class="emph">Contact Phone Number:</span><br/> 1 (863) 555-3579</div>
							</div>
							<div class="row marT-20">
								<div class="col-md-6"><span class="emph">Payment Info:</span><br/>Visa Card<br/>XXX-XXXX-XXXX-1093</div>
								<div class="col-md-6"><span class="emph">Address:</span><br/><?php echo $user_data['address']; ?></div>
							</div>
						</div>
						<div class="col-md-4 marT-20 text-right">
							<p><span class="emph">Account #:</span> 000000<?php echo $user_data['id']; ?></p>
							<a href="cart.php" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Cart</a>
						
						</div>
					</div>
				</div>
			</div>		

		<?php } else { ?>
			
			<!-- // Redirect to home.php or...-->
			<div class="container">
				<h1>Go Home, You're <a href="home.php">Drunk</a></h1>

			</div>

		<?php } ?>
		

		<?php include 'footer.php'; ?>

	</body>
</html>