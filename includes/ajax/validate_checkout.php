<?php


require '../../includes.php';
require '../../header.php';
require_once('../../includes/Stripe/config.php');

$fields = array(			
	'full_name' 		=>	filter_var( $_POST['full_name'], FILTER_SANITIZE_STRING ),
	'customer_phone' 	=>	filter_var( $_POST['customer_phone'], FILTER_SANITIZE_STRING ),
	'customer_email'	=>	filter_var( $_POST['customer_email'], FILTER_SANITIZE_EMAIL ),
	'address_line1' 	=>	filter_var( $_POST['address_line1'], FILTER_SANITIZE_STRING ),
	'address_city' 		=>	filter_var( $_POST['address_city'], FILTER_SANITIZE_STRING ),
	'address_state' 	=>	filter_var( $_POST['address_state'], FILTER_SANITIZE_STRING ),
	'address_zip' 		=>	filter_var( $_POST['address_zip'], FILTER_SANITIZE_STRING ),
);

foreach($fields as $key => $value){
	if(empty($value)){
		$ers[] = $key;
	}
}


if( !empty($ers) ) {
	
	header('Content-Type: application/json');	
	//errors
	die(json_encode(array(
		'code' => 0,
		'message' => 'Please correct all errors before submitting.',
		'fields' => $ers
	)));
	
} else {

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

	  $message = '<h1>Thank you for your business. Your order is on its way!</h1>';
	  $message = '<a href="home.php">Take me Home.</a>';

	  header('Content-Type: application/json');
	  die(json_encode(array(
	  	'code' => 1,
	  	'message' => $message
	  )));

	} else {
		header('Content-Type: application/json');
		die(json_encode(array(
			'code' => 1,
			'message' => 'Payment Failed. Please Refresh and Try Again.'
		)));
	}

	

}