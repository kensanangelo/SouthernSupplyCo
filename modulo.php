<?php 
	
	$str_cart = '3,5,4,2,12,4';
	$cart = explode(',', $str_cart);
	$product_ids = array();
	$quantities = array();

	// $x = 2;
	// for($i = 0; $i < 30; $i++){
	// 	echo $i % $x.'<br />';
	// }


	$i = 0;
	$x = 2;

	foreach($cart as $key => $value){
		echo 'key = '.$key.'<br />';
		echo 'value = '.$value.'<br />';

		// This operator alternates between true or false , aka even rows and odd rows
		if ($i % $x == 0) {
			// Even slot
			$product_ids[] = $value;
			$last_product_id = $new_cart[$key];
		} else {
			// Odd slow
			$quantities[] = $value;
		}

		$i++;

	}

	// Once we have arrays set up for product ids and quantites, 
	//	make a single 2d array out of them
	for ($j=0; $j < count($product_ids); $j++) { 
		$new_array[$product_ids[$j]] = $quantities[$j];
	}
	
	echo '<pre>';
	print_r($new_array);
	echo '</pre>';

	var_dump(1 == '1');

 ?>