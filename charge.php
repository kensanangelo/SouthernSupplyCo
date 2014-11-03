<?php
session_start();

  require_once('includes/Stripe/config.php');

  $token  = $_POST['stripeToken'];
  $order_total = $_POST['order_total'];
  $stripe_total = $_POST['stripe_total'];

  $customer = Stripe_Customer::create(array(
      'email' => 'hutch78@me.com',
      'card'  => $token
  ));

  $charge = Stripe_Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $stripe_total,
      'currency' => 'usd'
  ));

?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Southern Supply Co. Checkout - Group 4</title>

    <?php 
      require 'header.php';
      require 'includes.php';

    ?>
    <div class="container">
      <div class="option">
        <h3>Thank you for your purchase!</h3>
        <p>$<?php echo $order_total; ?> has been charged to your card ending in XXXX</p>
        
      </div>
    </div>

    <?php include 'footer.php'; ?>


  </body>
</html>