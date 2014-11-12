<?php
//Passes in entire results array from query
function print_stars($rating, $numOfVotes){
	
	$average =($rating/$numOfVotes);

	$html = '';
	for($i = 0; $i < 5; $i++){
		$i < $average ? $html .= '<span class="glyphicon glyphicon-star"></span>' : $html .= '<span class="glyphicon glyphicon-star-empty"></span>';
	}
	echo $html;
	
}

//Adds pre tags around an array
function pre_print_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

//Performs search query
function ssc_query($search_term, $mode = 'search'){

	include 'connectdb.php';

	// Get Search
	$search_term = preg_replace("/[^A-Za-z0-9]/", " ", $search_term);
	$search_term = $connection->real_escape_string($search_term);

	// Build Query
	$all_query = 'SELECT * FROM products';

	$search_query = 'SELECT * FROM products 
	WHERE productName
	LIKE "%'.$search_term.'%" 
	OR description LIKE "%'.$search_term.'%"
	OR category LIKE "%'.$search_term.'%"';

	$id_query = 'SELECT * FROM products 
	WHERE productID = '.$search_term;

	$cat_query = 'SELECT * FROM products 
	WHERE category LIKE "%'.$search_term.'%"';

	switch($mode){
		case 'search':
			$the_query = $search_query;
			break;
		case 'catalog':
			$the_query = $all_query;
			break;
		case 'ID':
			$the_query = $id_query;
			break;
		case 'category':
			$the_query = $cat_query;
			break;
	}

	// Do Search
	$result = $connection->query($the_query);
	while($results = $result->fetch_array()) {
	    $result_array[] = $results;
	}

	return $result_array;

}

function split_cart($str_cart){

	//	-IMPORTANT-
	$i = 0;
	$x = 2;
	$product_ids = array();
	$quantities = array();

	$cart = explode(',', $str_cart);

	foreach($cart as $key => $value){
		// echo 'key = '.$key.'<br />';
		// echo 'value = '.$value.'<br />';

		// This operator alternates between true or false , aka even rows and odd rows
		//	Even rows we fill products_id array, odds we fill quantities array
		if ($i % $x == 0) {
			// Even slot
			$product_ids[] = $value;

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
	return $new_array;
}

function cart_to_str($array_2d){
	foreach($array_2d as $product => $quantity){
		$str_array[] = (string)$product;
		$str_array[] = (string)$quantity;
	}
	$new_array = implode($str_array, ',');

	return $new_array;

}


function process_cart($mode, $id, $qty){

	//	Note to Self:
	//	Be careful with data types here
	unset($_SESSION['cdb']);
	
	$id = isset($id) ? (int)$id : null;
	$qty = isset($qty) ? (int)$qty : 1;

	if(isset($_SESSION['cart'])){

		$cart = $_SESSION['cart'];
		$split_cart = split_cart($cart);

		$_SESSION['cdb'] .= 'id_str = '.$id_str;

		if($mode == 'update_total'){

			echo 'print_r split_cart';
			pre_print_r($split_cart);

			foreach($split_cart as $key => $value){

				if($key){

					$item_found = 0;
					echo '<br />Product_id= '.$key.', Id=  '.$id.'<br />';

					if($id == $key){

						$item_found = 1;
						// If the new quantity is higher than the old quantity
						if((int)$qty == 0){
							//  unset($product_id);

							$_SESSION['cdb'] .= ', qty = 0 condition met';

							return $split_cart;

						// $qty = Value passed into this function (new value)
						//	$value = Value stored in the cart array (old value)
						} elseif ((int)$qty > 0) {

							$_SESSION['cdb'] .= ', qty > 0 hit';

							$value = $qty;

							$_SESSION['cart'] = cart_to_str($split_cart);

							return $split_cart;

						} else {

							die('How did I get here ??? Cart Error!!');

						}
					}
				}
				

			} // endforeach

			// if the item is not already in the cart
			if (!$item_found && $qty) {

				$_SESSION['cdb'] .= ', item not currently in cart';

				//	Take the string cart and add a new product and quantity to the end of it
				$cart = cart_to_str($split_cart);

				// $split_cart[$id] = $qty;
				$cart .= $id.','.$qty.',';

				$_SESSION['cart'] = $cart;

				return $cart;
			}

		} 
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

	// add item to the beginning of cart
	} else {

		$_SESSION['cdb'] .= ', no session cart conditional';

		$cart = $id.','.$qty.',';

		$_SESSION['cart'] = $cart;

		return $cart;

	}

}

function compareInfo($user, $pass){
	echo "IT WORKED!>!!>!> :)))))";
}