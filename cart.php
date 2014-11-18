<?php
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

			$sub_total = 0;

			if (isset($_POST['mode'])) {
				if ($_POST['mode'] == 'update_total') {
					$product_id = $_POST['product_id'];
					$qty = $_POST['product_quantity'];
				}
				
			}

			// pre_print_r($_POST);

			$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

				if (isset($_GET['mode']) && $_GET['mode'] == 'empty_cart') {

					unset($_SESSION['cart']);
					unset($_SESSION['cdb']);
					unset($cart);
					$display_msg =  'Your Cart has been emptied<br />';

				} else if(isset($_POST['mode'])){
					$mode = $_POST['mode'];
					$product_id = $_POST['product_id'];
					$qty = $_POST['product_quantity'];

					if($mode == 'update_total'){
						if($product_id != null){

							$split_cart = isset($qty) ? process_cart('update_total', $product_id, $qty) : process_cart('update_total', $product_id);
							$display_msg = 'Item added to Cart!';

							$cart_has_products = 1;


						} else {

							$display_msg =  'Whoops! No Product Specified';

						}

					} else if($mode == 'remove'){


						if($product_id){


							$altered_cart = process_cart('update_total', $product_id, 0);

							$_SESSION['cart'] = cart_to_str($altered_cart);

							$display_msg = 'Item removed from Cart';
							if(!$cart || strlen($_SESSION['cart'] == 0)){
								$display_msg .= '<br /><div>Your Cart has been emptied</div>';
							} else {
								$cart_has_products = 1;
							}
						} else {
							$display_msg =  'Whoops! No Product Specified';
						}


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

					$split_cart = split_cart($_SESSION['cart']);
					
					$order_total = 0;

					// - Important--
					$j = 0;

					foreach($split_cart as $product_id => $quantity){

						$product_id = (int)$product_id;
						$result_array[$j] = ssc_query($product_id, 'ID');
						$cart_data[] = $result_array[$j][0];

						$item_total = $result_array[$j][0]['price'] * $quantity;

						$sub_total += $item_total;

						$cart_additional[$j]['quantity'] = $quantity;
						$cart_additional[$j]['item_total'] = $item_total;

						$j++;
					}

					$sales_tax = $sub_total * 0.07;
					$sales_tax = round($sales_tax, 2);

					$order_total = $sub_total + $sales_tax;
					$order_total = round($order_total, 2);

					$stripe_total = $order_total * 100;

				}

				// pre_print_r($_SESSION);
				// pre_print_r($_POST);

		?>
		<div class="container">
			<div class="row marT-20 marB-20">
				<div class="col-md-6">
					<h1><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h1>
					<?php if(isset($display_msg)){ echo '<h3>'.$display_msg.'</h3>'; ?>
					<?php } elseif($cart_data) { ?>
						<h3>There are <?php echo count($cart_data); ?> items in your cart.</h3>
					<?php } ?>
				</div>
				<div class="col-md-2 col-md-offset-4 text-right">
					<?php if (isset($cart_data)): ?>
						<form action="checkout.php" method="POST">
								<input type="hidden" name="stripe_total" value="<?php echo $stripe_total; ?>">
								<input type="hidden" name="order_total" value="<?php echo $order_total; ?>">
								<button type="submit" class="btn btn-default marB-10">
									<span class="glyphicon glyphicon-lock"></span> Checkout Now
								</button>
						</form>
						<a href="cart.php?mode=empty_cart" class="btn btn-default"><span class="glyphicon"></span> Empty Cart</a>
					<?php endif ?>
				</div>
			</div>
			<?php if (isset($cart_data)): ?>
				<?php $i = 0; ?>
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
							<a class="productLink" href="product.php?product=<?php echo $result['productID']; ?>"><h3><?php echo $result['productName']; ?></h3></a>
							<div class="catStars">
								<?php print_stars($result['rating'], $result['numOfVotes']); ?>
							</div>
							<?php if (isset($result['description'])) { ?>
								<p><?php echo $result['description']; ?></p>
							<?php } ?>
						</div>
						<div class="col-md-2 text-right">
							<p class="cartPrice marT-20">Item Total: $<?php echo $cart_additional[$i]['item_total']; ?></p>
							<p class="">Unit Price: $<?php echo $result['price']; ?> </p>
							<form class="cart-update-form" action="cart.php?mode=update_total" method="post">
								<input type="hidden" name="product_id" value='<?php echo $result['productID']; ?>' />
								<input type="hidden" name="mode" value='update_total' />
								<p>Qty: <input class="input-ext" type="text" name="product_quantity" value="<?php echo $cart_additional[$i]['quantity']; ?>" size="3"/></p>
								<input type="submit" class="add-qty-btn btn-ext btn btn-default"  value="Update" />
							</form>
							<!-- <a href="cart.php?mode=add&product_id=<?php echo $row['productID']; ?>"  class="btn btn-default push"><span class="glyphicon glyphicon-plus"></span> Add to Cart</a> -->
							<form action="cart.php" method="post">
								<input type="hidden" name="product_id" value='<?php echo $result['productID']; ?>' />
								<input type="hidden" name="mode" value='remove' />
								<button type="submit" class="btn btn-default button">
									<span class="glyphicon glyphicon-remove"></span> Remove
								</button>
							</form>
						</div>
					</div>
					<?php $i++; ?>

				<?php } ?>
			<?php endif ?>
			
			
		</div>

		<?php if (isset($cart_data)): ?>
			<div class="container marT-20">
				<div class="row">
					<div class="col-md-3 col-md-offset-9 text-right">
						<ul>
							<?php if(isset($sub_total)){ ?>
								<li>Subtotal: $<?php echo $sub_total; ?></li>
							<?php } ?>
							<?php if(isset($sales_tax)){ ?>
								<li>Sales Tax: $<?php echo $sales_tax; ?></li>
							<?php } ?>
							<?php if(isset($sales_tax)){ ?>
								<li class="price marT-20">Total: $<?php echo $order_total; ?></li>
							<?php } ?>
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
		<?php endif; ?>
		

		<?php include 'footer.php'; ?>
		
	</body>
</html>