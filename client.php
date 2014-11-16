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
							<h2><?php echo $user_data['username']; ?></h2>
							
							<ul class="marT-20">
								<li class="marT-10"><span class="emph">Name:</span><br/>
									<?php if ($user_data['first_name'] && $user_data['last_name'])  { ?>
										<?php echo $user_data['first_name'].' '.$user_data['last_name']; ?>
									<?php } else if($user_data['first_name']) { ?>
										<?php echo $user_data['first_name']; ?>
									<?php } else if($user_data['last_name']){ ?>
										<?php echo $user_data['last_name']; ?>
									<?php } else { ?>
										No Name Provided
									<?php } ?>
								</li>
								<li class="marT-10"><span class="emph">Type:</span><br/>
									<?php
									if($user_data['user_access']==2)
										echo "User"; 
									else if($user_data['user_access']==3)
										echo "Admin";
									else if($user_data['user_access']==4)
										echo "Super User";
									?>
								</li>
								<li class="marT-10"><span class="emph">Email:</span><br/><?php echo $user_data['email']; ?></li>
								<li class="marT-10"><span class="emph">Address:</span><br/><?php echo $user_data['address']; ?></li>
							</ul>
						</div>
						<div class="col-md-4 marT-20 text-right">
							<p><span class="emph">Account #: </span><?php echo $user_data['id']; ?></p>
							<a href="cart.php" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Go to Cart</a>
						
						</div>
					</div>
				</div>
			</div>		

		<?php } else { ?>
			
			<!-- // Redirect to home.php or...-->
			<div class="container">
				<h2>You must be logged in to access your profile.</h2> 
				<ul>
					<li><a href="home.php">Go to the home page.</a></li>
					<li><a href="login.php">Go to the login page.</a></li>
				</ul>
			</div>

		<?php } ?>
		

		<?php include 'footer.php'; ?>

	</body>
</html>