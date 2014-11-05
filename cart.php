<?php
session_start();
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Cart - Group 4</title>

		<?php 
			include 'includes.php';
			include 'header.php';

			//echo 'Get: <br />';
			//pre_print_r($_GET);

			$cart = $_SESSION['cart'];

				//echo 'Get: <br />';
				//pre_print_r($_GET);

				if(isset($_GET['mode'])){
					$mode = $_GET['mode'];
					$product_id = $_GET['product_id'];

					if($mode == 'add'){
						if($product_id){

							$cart = process_cart('add', $product_id);

							$display_msg = 'Item added to Cart';

							$cart_has_products = 1;


						} else {

							$display_msg =  'Whoops! No Product Specified';

						}

					} else if($mode == 'remove'){


						if($product_id){
							process_cart('remove', $product_id);

							$display_msg = 'Item removed from Cart';
							if(!$cart || strlen($_SESSION['cart'] == 0)){
								$display_msg .= '<div>Your Cart has been emptied</div>';
							} else {
								$cart_has_products = 1;
							}
						} else {
							$display_msg =  'Whoops! No Product Specified';
						}


					} else if($mode == 'empty_cart'){

						unset($_SESSION['cart']);
						unset($cart);
						$_SESSION['logged_in'] = 1;
						$display_msg =  'Your Cart has been emptied<br />';

					} else {
						$display_msg =  'Invalid Cart Mode. Please refresh the page.';
					}
				} else {
					if(!$cart || strlen($_SESSION['cart'] == 0)){
						$display_msg = 'Cart Empty';
					} else {
						$cart_has_products = 1;
					}
				}

				//	Populate Cart array

				if(isset($_SESSION['cart'])){

					$cart = explode(', ',$_SESSION['cart']);
					$cart_length = count($cart) - 1;
					$order_total = 0;

					for($i = 0;$i < $cart_length; $i++){

						$product_id = (int)$cart[$i];
						$result_array[$i] = ssc_query($product_id, 'ID');
						$cart_data[] = $result_array[$i][0];

						$sub_total += $result_array[$i][0]['price'];

					}

					$sales_tax = $sub_total * 0.07;
					$sales_tax = round($sales_tax, 2);

					$order_total = $sub_total + $sales_tax;
					$order_total = round($order_total, 2);

					$stripe_total = $order_total * 100;

				}

				//pre_print_r($cart_data);
				//die();


		?>
		<div class="container">
			<div class="row marT-20 marB-20">
				<div class="col-md-6">
					<h1><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h1>
					<?php if($display_msg){ echo '<h3>'.$display_msg.'</h3>'; } ?>
				</div>
				<div class="col-md-2 col-md-offset-4 text-right">
					<a href="checkout.php" class="btn btn-default"><span class="glyphicon glyphicon-lock"></span> Checkout Now</a>
					<a href="cart.php?mode=empty_cart" class="btn btn-default"><span class="glyphicon"></span> Empty Cart</a>
				</div>
			</div>
			<?php foreach($cart_data as $result){ 

				// $result['description'];
				// $result['rating'];
				// $result['numOfVotes'];
				// $result['productImage'];

				?>
			
				<div class="row option">
					<div class="col-md-3">
						<a href="product.php">
							<img class='img-responsive' src="<?php echo $result['productImage']; ?>" alt="A 50lb bag of concrete">
						</a>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<a class="productLink" href="product.php"><h3><?php echo $result['productName']; ?></h3></a>
						<div class="catStars">
							<?php print_stars($result['rating'], $result['numOfVotes']); ?>
							<!-- <span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span> -->
						</div>
						<p>QUIKRETE® Concrete Mix is the original 4000 psi average compressive strength blend of portland cement, sand, and gravel or stone. Just add water. Use for any general concrete work.</p>
					</div>
					<div class="col-md-2 text-right">
						<p class="cartPrice marT-20">Item Total: $74.40</p>
						<p class="">Unit Price: $<?php echo $result['price']; ?> </p>
						<?php /*<p>Qty: <input type="text" value="30" size="3"/>
						
						<button class="button">Update</button></p>*/ ?>
						<p><a href="cart.php?mode=remove&product_id=<?php echo $result['productID']; ?>" class="button"><span class="glyphicon glyphicon-remove"></span> Remove</a></p>
					</div>
				</div>

			<?php } ?>
			
		</div>

		<div class="container marT-20">
			<div class="row">
				<div class="col-md-3 col-md-offset-9 text-right">
					<ul>
						<li>Subtotal: $<?php echo $sub_total; ?></li>
						<li>Sales Tax: $<?php echo $sales_tax; ?></li>
						<li class="price marT-20">Total: $<?php echo $order_total; ?></li>
					</ul>
					<form action="checkout.php" method="POST">
						<input type="hidden" name="stripe_total" value="<?php echo $stripe_total; ?>">
						<input type="hidden" name="order_total" value="<?php echo $order_total; ?>">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-lock"></span> Checkout Now
						</button>
					</form>
						<!-- <a href="checkout.php" class="btn btn-default"></a> -->
				</div>
			</div>
		</div>
		

		<?php include 'footer.php'; ?>
		
	</body>
</html>