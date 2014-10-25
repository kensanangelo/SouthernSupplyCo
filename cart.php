<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Cart - Group 4</title>

		<?php 
			include 'header.php';
			include 'includes.php';

			//echo 'Get: <br />';
			//pre_print_r($_GET);

			if(isset($_GET['mode'])){
				$mode = $_GET['mode'];
				$product_id = $_GET['product_id'];

				if($mode == 'add'){
					if($product_id){

						$cart = process_cart('add', $product_id);

					} else {

						echo 'Whoops! No Product Specified';

					}

				} else if($mode == 'remove'){

					if($product_id){
						process_cart('remove', $product_id);
					} else {
						echo 'Whoops! No Product Specified';
					}

				} else if($mode == 'empty_cart'){

					unset($_SESSION['cart']);
					unset($cart);
					echo 'Your Cart has been emptied<br />';

				} else {
					echo 'Invalid Cart Mode. Please refresh the page.';
				}
			} else {
				echo '<p>No Mode selected</p>	';
			}


		?>
		<div class="container">
			<div class="row marT-20 marB-20">
				<div class="col-md-6">
					<h1><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h1>
				</div>
				<div class="col-md-2 col-md-offset-4 text-right">
					<a href="checkout.php" class="btn btn-default"><span class="glyphicon glyphicon-lock"></span> Checkout Now</a>
				</div>
			</div>
			<div class="row option">
				<div class="col-md-3">
					<a href="product.php">
						<img class='img-responsive' src="img/products/2.jpg" alt="A 50lb bag of concrete">
					</a>
				</div>
				<div class="col-md-6 col-md-offset-1">
					<a class="productLink" href="product.php"><h3>50lb Concrete</h3></a>
					<div class="catStars">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
					</div>
					<p>QUIKRETE® Concrete Mix is the original 4000 psi average compressive strength blend of portland cement, sand, and gravel or stone. Just add water. Use for any general concrete work.</p>
				</div>
				<div class="col-md-2 text-right">
					<p class="cartPrice marT-20">Item Total: $74.40</p>
					<p class="">Unit Price: $2.48 </p>
					<p>Qty: <input type="text" value="30" size="3"/>
					
					<button class="button">Update</button></p>
				</div>
			</div>
			<div class="row option">
				<div class="col-md-3">
					<a href="product.php">
						<img class='img-responsive' src="img/products/8.jpg" alt="A 47lb bag of portland cement">
					</a>
				</div>
				<div class="col-md-6 col-md-offset-1">
					<a class="productLink" href="product.php"><h3>47lb Portland Cement</h3></a>
					<div class="catStars">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
					</div>
					<p>QUIKRETE® Portland Cement complies with current ASTM C150 and Federal Specifications for portland cement. Can be mixed with aggregate and other ingredients to make concrete mix, mortar mix, and base coat stucco. Available in Type I, Type I/II and Type III.</p>
				</div>
				<div class="col-md-2 text-right">
					<p class="cartPrice marT-20">Item Total: $102.34</p>
					<p class="">Unit Price: $5.47 </p>
					<p>Qty: <input type="text" value="22" size="3"/>
					
					<button class="button">Update</button></p>
				</div>
			</div>
		</div>

		<div class="container marT-20">
			<div class="row">
				<div class="col-md-3 col-md-offset-9 text-right">
					<ul>
						<li>Subtotal: $176.74</li>
						<li>Sales Tax: $0.00</li>
						<li class="price marT-20">Total: $176.74</li>
					</ul>
					<a href="checkout.php" class="btn btn-default"><span class="glyphicon glyphicon-lock"></span> Checkout Now</a>
				</div>
			</div>
		</div>
		

		<?php include 'footer.php'; ?>
		
	</body>
</html>