<?php
session_start();

  require 'includes.php';
  require 'header.php';

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

  if ($charge->paid == 1) {
    $order_values = array($_POST['user_id'], $_POST['cart'], $_POST['order_total'], $_POST['purchase_date'], $_POST['full_name'], $_POST['customer_phone'], $_POST['customer_email'], $_POST['address_line1'], $_POST['address_line2'], $_POST['address_city'], $_POST['address_state'], $_POST['address_zip']);
    $process_order = addToDB('orders', $order_values);
  }

?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Southern Supply Co. Checkout - Group 4</title>

    <?php 
  

    ?>
    <div class="container">
      <div class="option">
        <h3>Thank you for your purchase!</h3>
        <p>$<?php echo $order_total; ?> has been charged to your card ending in XXXX</p>
        <?php if ($process_order != 'Success'): ?>
          <?php echo $process_order; ?>
        <?php endif ?>
        
      </div>
    </div>
    
    <?php include 'footer.php'; ?>


  </body>
</html>