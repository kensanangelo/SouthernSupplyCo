<?php
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Southern Supply Co. Checkout - Group 4</title>

		<?php 
			include 'includes.php';
			include 'header.php';

			$order_total = $_POST['order_total'];
			$stripe_total = $_POST['stripe_total'];
		?>
		<div id="push-down"></div>
		<div class="container">
			<div class="option">
				<h3>Complete Your Purchase</h3>
				<h4>Order Total: <?php echo $order_total; ?></h4>
				<form id="checkout-form" action="charge.php" method="POST">
					<fieldset class="form-section">
    					<legend>Your Details</legend>
    					<ul>
							<li>
								<label class="labelFix" for="name">
									Name:
								</label>
								<input type="text" id="name" name="full_name" placeholder="First and Last Name"/>
							</li>
							<li>
								<label class="labelFix" for="phone">
									Phone #:
								</label>
								<input size="13" type="text" name="customer_phone" id="phone" placeholder="(555)555-5555"/>
							</li>
							<li>
								<label class="labelFix" for="email">
									Email:
								</label>
								<input type="text" id="email" name="customer_email" placeholder="example@sample.com"/>
							</li>						
						</ul>
					</fieldset>
					<fieldset class="form-section">
    					<legend>Shipping Information</legend>
    					<ul>
							<li>
								<label class="labelFix" for="line1">
									Address Line 1:
								</label>
								<input type="text" id="line1" name="address_line1" placeholder="555 Sample Ave."/>
							</li>
							<li>
								<label class="labelFix" for="line2">
									Address Line 2:
								</label>
								<input type="text" id="line2" name="address_line2" placeholder="Apt. 555"/>
							</li>
							<li>
								<label class="labelFix" for="city">
									City:
								</label>
								<input type="text" id="city"  name="address_city" placeholder="Example City"/>
							</li>
							<li>
								<label class="labelFix" for="state">
									State:
								</label>
								<input size="2" type="text" id="state" name="address_state" placeholder="FL"/>
							</li>
							<li>
								<label class="labelFix" for="zip">
									Zip Code:
								</label>
								<input size="5" type="text" id="zip" name="address_zip" placeholder="55555"/>
							</li>
						</ul>
					</fieldset>
					<fieldse class="form-section">
    					<legend>Card Details</legend>
    					<ul>
							<li>
								<fieldset id="card">
									<legend>Card Type</legend>
									<ul  id="card-types">
										<li>
											<input type="radio" name="cc_visa" value="visa" id="visa"/>
											<label for="visa">
												Visa
											</label>
										</li>
										<li>
											<input type="radio" name="cc_mastercard" value="mastercard" id="mastercard"/>
											<label for="mastercard">
												Mastercard
											</label>
										</li>
										<li>
											<input type="radio" value="discover" name="cc_discover" id="discover"/>
											<label for="discover">
												Discover
											</label>
										</li>
									</ul>
								</fieldset>
							</li>
							<li>
								<label class="labelFix" for="cardNum">
									Card Number:
								</label>
								<input size="17" type="text" id="cardNum" placeholder="XXX-XXXX-XXXX-XXX" data-stripe="number" />
							</li>
							<li>
								<label class="labelFix" for="code">
									Security Code:
								</label>
								<input size="3" type="text" id="code" placeholder="XXX" data-stripe="cvc" />
							</li>
							<li>
								<label class="labelFix" for="nameCard">
									Name on Card:
								</label>
								<input type="text" id="nameCard" name="card_full_name" placeholder="Firstname M. Lastname"/>
							</li>
							<li>
								<label class="labelFix">
									<span>Expiration (MM/YYYY)</span>
								</label>
								<input type="text" size="2" class="expiration-month" data-stripe="exp-month" placeholder="MM" />
								<span> / </span>
								<input type="text" size="4" class="expiration-year" data-stripe="exp-year" placeholder="YYYY" />
							</li>
						</ul>
					</fieldset>
					<input type="submit" value="Complete Purchase" class="btn btn-default complete"/>
					<input type="hidden" name="stripe_total" value="<?php echo $stripe_total; ?>">
					<input type="hidden" name="order_total" value="<?php echo $order_total; ?>">
					<span class="payment-errors"></span>
				</form>
			</div>
		</div>

		<?php include 'footer.php'; ?>

		<?php

			// ---Important--- Stripe Config File
			require_once('includes/Stripe/config.php');

		?>

		<?php /* Stripe JS Library */ ?>
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		<script src="js/checkout.js"></script>



	</body>
</html>