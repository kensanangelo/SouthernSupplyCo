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
	$str_array = array();
	foreach($new_array as $product => $quantity){
		$str_array[] = (string)$product;
		$str_array[] = (string)$quantity;
	}
	$new_array = implode($str_array, ',');

	return $new_array;
}


function process_cart($mode, $id, $qty = 1){
	//ToDo:
	/*
		- Sanitize string, since it comes from the get array

	*/
	$id_str = (string)$id;
	$product_qty = (string)$qty;

	if(isset($_SESSION['cart'])){

		$cart = $_SESSION['cart'];

		if($mode == 'update_total'){

			$split_cart = split_cart($cart);

			foreach($split_cart as $product_id => $quantity){
				if($id_str == $product_id){
					// If the new quantity is higher than the old quantity
					if($qty == 0){
						unset($product_id);

					}
				}
			}

			if($product_qty){
				$cart .= $id_str.','.$product_qty.',';
			} else {
				$cart .= $id_str.',1,';
			}


			

			$_SESSION['cart'] = $cart;

			return $cart;


		} else if($mode == 'remove'){

			// split the session cart into an array, seperated at the commas
			$cart = explode(', ', $cart);
			foreach($cart as $key => $product){

				// if the value of the item in the array is equal to the id passed to this function:
				if($product == $id){

					// Remove this item from the array
					unset($cart[$key]);

				}
			}

			$cart = implode(', ', $cart);

			$_SESSION['cart'] = $cart;

			return $cart;

		} else {

			return 'Invalid Cart Mode. Please refresh the page.';

		}

	// add item to the beginning of cart
	} else {

		// add the item to the beginning of the cart
		$cart = $id_str.', ';

		$_SESSION['cart'] = $cart;

		return $cart;

	}

}

function compareInfo($user, $pass){
	echo "IT WORKED!>!!>!> :)))))";
}