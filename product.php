<?php
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. | Construction Supplies - Group 4</title>
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

		<div id="push-down"></div>
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

							</div>

							<div class="col-md-4 marT-20 text-right">

								<p class="price">$<?php echo $row['price']; ?></p>

								<form action="cart.php?mode=update_total" method="post">
									<input type="hidden" name="product_id" value='<?php echo $row['productID']; ?>' />
									<input type="hidden" name="mode" value='update_total' />
									<div class="row">
										<div class="col-xs-6 col-md-4 push"> <p>Qty: <input class="input-ext" type="text" name="product_quantity" value="1" /></p>
										<input type="submit" class="add-qty-btn btn btn-ext btn-default push" value="Add to Cart" /></div>
									</div>
								</form>
								<!-- <a href="cart.php?mode=add&product_id=<?php echo $row['productID']; ?>"  class="btn btn-default push"><span class="glyphicon glyphicon-plus"></span> Add to Cart</a> -->
			
							</div>

						</div><?php /* row */ ?>

					<?php } // end foreach ?>
					
				</div><?php /* option */ ?>

				<hr>
				<h4 class="marB-20">Similar products you might like:</h4>

				<?php 
				
					//Handles recommendations
					$current_cat = $result_array[0]['category'];;
					$similar_array = ssc_query($current_cat, 'category');
				?>
				
				<div class='row'>
					<?php
						//Loops through other items in the category
						for($i=0;$i<6;$i++){
							//If the product is the same as a recommended, it picks a different one, unless that different one is that product
							if($result_array[0]['productID']==$similar_array[$i]['productID']
								&& $result_array[0]['productID']!=$similar_array[6]['productID']) {
								$oldIter=$i;
								$i=6;
							}
						?>
							<div class="col-md-2 col-sm-6 col-xs-6 option option-sim">
								<a href="product.php?product=<?php echo $similar_array[$i]['productID']; ?>">
									<img class='img-responsive' src="<?php echo $similar_array[$i]['productImage']; ?>" alt="<?php echo $similar_array[$i]['productName']; ?>">
								</a>
								<div>
									<a class="productLink" href="product.php?product=<?php echo $similar_array[$i]['productID']; ?>"><h3 class="productSpacer productSpace-sim"><?php echo $similar_array[$i]['productName']; ?></h3></a>
									<div class="catStars catStars-sim">
										<?php print_stars($similar_array[$i]['rating'], $similar_array[$i]['numOfVotes']); ?>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p class="price">$<?php echo $similar_array[$i]['price']; ?></p>
										</div>
									</div>
								</div>
							</div>
					<?php
						if($i==6)
							$i=$oldIter;
					 }	?>
				</div>
				<?php
					//Handles reviews
					$review_count = numberOfReviews($product_id);

					if ($review_count > 0) {
						include 'reviews.php';
					}
					else if (!isset($_SESSION['reviewed'][$product_id])) {
						include 'leave-review.php';
					}

				?>



			<?php } else { ?>

				<h3>There are no products to display. Please go back to the <a href="catalog.php">Catalog</a> and select one</h3>

			<?php } ?>


		</div>	<?php /* End Container */ ?>	

		<?php include 'footer.php'; ?>

	</body>
</html>