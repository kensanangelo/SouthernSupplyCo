<?php
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Product - Group 4</title>
			<link rel="stylesheet" type="text/css" href="css/star-rating.css">

		<?php 
			include 'includes.php';
			include 'header.php';

			global $connection;

			if(isset($_GET['product'])){
				$product_id = $_GET['product'];
				$_SESSION['current_product'] = $product_id;
				$result_array = ssc_query($product_id, 'ID');
				// pre_print_r($query);
			}

		?>
		<div class="container">

			<?php if($product_id){ ?>

				<ol class="breadcrumb">
					<li><a href="home.php">Home</a></li>
					<li><a href="catalog.php?category=<?php echo $result_array[0]['category']; ?>"><?php echo $result_array[0]['category']; ?></a></li>
					<li class="active"><?php echo $result_array[0]['productName']; ?></li>
				</ol>
				<div class="option">

					<?php foreach($result_array as $row){ ?>

						<div class="row">

							<div class="col-md-3">
									<img class='img-responsive' src="<?php echo $row['productImage']; ?>" alt="A 50lb bag of concrete">
							</div>

							<div class="col-md-4 col-md-offset-1">

								<h3><?php echo $row['productName']; ?></h3>
								<div class="catStars">
									<?php print_stars($row['rating'], $row['numOfVotes']); ?>
								</div>

								<h4>Description</h4>
								<p><?php echo $row['description']; ?></p><br />

								<?php 
								$review_count = numberOfReviews($product_id);

								if ($review_count > 0) {
									include 'reviews.php';
								}
								elseif (!isset($_SESSION['reviewed'][$product_id])) {
									include 'leave-review.php';
								}

								?>

							</div>

							<div class="col-md-4 marT-20 text-right">

								<p class="price">$<?php echo $row['price']; ?></p>

								<p>Qty: <input type="text" value="1" size="3"/></p>

								<a href="cart.php?mode=add&product_id=<?php echo $row['productID']; ?>"  class="btn btn-default">
									<span class="glyphicon glyphicon-plus"></span> 
									Add to Cart
								</a>
							
							</div>

						</div><?php /* row */ ?>

					<?php } // end foreach ?>

				</div><?php /* option */ ?>

			<?php } else { ?>

				<h3>There are no products to display. Please go back to the <a href="catalog.php">Catalog</a> and select one</h3>

			<?php } ?>


		</div>	<?php /* End Container */ ?>	

		<?php include 'footer.php'; ?>

	</body>
</html>