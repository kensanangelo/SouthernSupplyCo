<?php
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Catalog - Group 4</title>

		<?php 
			include 'includes.php';
			include 'header.php';

			$is_search = 0;

			global $connection;

			if(isset($_GET['product'])){
				$product_id = $_GET['product'];
				$result_array = ssc_query($product_id, 'ID');
				// pre_print_r($query);
				$is_search = 1;
				
			} elseif(isset($_GET['category'])){ 
				$current_cat = $_GET['category'];
				$result_array = ssc_query($current_cat, 'category');
				$is_search = 1;
			} else {
				// Define the query
				$result_array = ssc_query('', 'catalog');
			}

			
		?>

		<div id="catalog" class='container categories'>
			<ol class="breadcrumb">
				<li><a href="home.php">Home</a></li>
				<?php if($current_cat){ ?>
					<li class="active"><?php echo $current_cat; ?></li>
				<?php } else if($product_id){ ?>
					<li class="active"><?php echo $result_array[0]['productName']; ?></li>
				<?php } else { ?>
					<li class="active">Catalog</li>
				<?php } ?>
			</ol>
			
			<?php if($is_search) { ?>
				<h1 class="marB-20"><?php echo $current_cat; ?></h1>
			<?php } else { ?>
				<h1 class="marB-20">Catalog</h1>
			<?php } ?>
				<div class="row">
					<?php $i = 0; ?>
					<?php foreach($result_array as $row){ ?>
	
						<div class="col-md-3 col-sm-6 option">
							<a href="product.php?product=<?php echo $row['productID']; ?>">
								<img class='img-responsive' src="<?php echo $row['productImage']; ?>" alt="<?php echo $row['productName']; ?>">
							</a>
							<div>
								<a class="productLink" href="product.php?product=<?php echo $row['productID']; ?>"><h3 class="productSpacer"><?php echo $row['productName']; ?></h3></a>
								<div class="catStars">
									<?php print_stars($row['rating'], $row['numOfVotes']); ?>
								</div>
								<div class="row">
									<div class="col-md-4">
										<p class="price">$<?php echo $row['price']; ?></p>
									</div>
									<div class="col-md-8 qty-add">
										<form action="cart.php?mode=update_total" method="post">
											<input type="hidden" name="product_id" value='<?php echo $row['productID']; ?>' />
											<input type="hidden" name="mode" value='update_total' />
											<p class="push">Qty: <input class="input-ext" type="text" name="product_quantity" value="1" /></p>
											<input type="submit" class="add-qty-btn btn btn-ext btn-default push" value="Add to Cart" />
										</form>
										<!-- <a href="cart.php?mode=add&product_id=<?php echo $row['productID']; ?>"  class="btn btn-default push"><span class="glyphicon glyphicon-plus"></span> Add to Cart</a> -->
										
									</div>
								</div>
							</div>
						</div>
						<?php $i++ ?>
						<?php if($i == 4){ ?>
								</div>
							<div class="row">
							<?php $i = 0; ?>

						<?php } ?>

					<?php } ?>
					
				</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>