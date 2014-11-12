<?php 

		// elseif ($mode = 'add') {

		// 	foreach($split_cart as $product_id => $quantity){
		// 		$item_found = 0;
		// 		// if the product is already in the cart
		// 		if($id_str == $product_id){
		// 			$item_found = 1;
		// 			// If the new quantity is higher than the old quantity
		// 			if($qty == 0){
		// 				unset($product_id);

		// 				return $split_cart;

		// 			// $qty = Value passed into this function (new value)
		// 			//	$quantity = Value stored in the cart array (old value)
		// 			} elseif ($qty > 0) {

		// 				$quantity = $qty;

		// 				return $split_cart;

		// 			} else {

		// 				die('How did I get here ??? Cart Error!!');

		// 			} // endif
		// 		} // endif
		// 	} // endforeach

		// } else if($mode == 'remove'){

		// 	// split the session cart into an array, seperated at the commas
		// 	$cart = explode(', ', $cart);
		// 	foreach($cart as $key => $product){

		// 		// if the value of the item in the array is equal to the id passed to this function:
		// 		if($product == $id){

		// 			// Remove this item from the array
		// 			unset($cart[$key]);

		// 		}
		// 	}

		// 	$cart = implode(', ', $cart);

		// 	$_SESSION['cart'] = $cart;

		// 	return $cart;

		// } else {

		// 	return 'Invalid Cart Mode. Please refresh the page.';

		// }