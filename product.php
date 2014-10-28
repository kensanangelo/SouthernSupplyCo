<?php
session_start();
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Product - Group 4</title>

		<?php 
			include 'header.php';
			include 'includes.php';
		?>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="home.php">Home</a></li>
				<li><a href="catalog.php">Concrete Mix</a></li>
				<li class="active">50lb Concrete</li>
			</ol>
			<div class="option">
				<div class="row">
					<div class="col-md-3">
							<img class='img-responsive' src="img/products/2.jpg" alt="A 50lb bag of concrete">
					</div>
					<div class="col-md-4 col-md-offset-1">
						<h3>50lb Concrete</h3>
						<div class="catStars">
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</div>

						<h4>Description</h4>
						<p>QUIKRETE® Concrete Mix is the original 4000 psi average compressive strength blend of portland cement, sand, and gravel or stone. Just add water. Use for any general concrete work.</p>
					</div>
					<div class="col-md-4 marT-20 text-right">
						<p class="price">$2.48</p>
						<p>Qty: <input type="text" value="1" size="3"/></p>
						<a href="cart.php" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add to Cart</a>
					
					</div>
				</div>
			</div>
		</div>		

		<?php include 'footer.php'; ?>

	</body>
</html>