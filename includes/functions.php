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


//Processes the cart
function process_cart($mode, $id){

	// convert the integer passed into this function as $id to a string
	$id_str = (string)$id;

	// if the $_SESSION cart has been established, we need to decide whether the user is trying to add or remove an item
	if(isset($_SESSION['cart'])){

		//	Temporarily store the session cart into a variable
		$cart = $_SESSION['cart'];

		if($mode == 'add'){

			// add the item to the end of the cart
			$cart .= $id_str.', ';

			// place the current cart into the session array
			$_SESSION['cart'] = $cart;

			return $cart;


		} else if($mode == 'remove'){

			// split the session cart into an array, seperated at the commas
			$cart = explode(', ', $cart);


			// loop through cart; 
			//	array looks like this: 
			//	$cart['cart_num'] = $product
			foreach($cart as $cart_num => $product){

				// if the value of the item in the array is equal to the id passed to this function:
				if($product == $id){

					// Remove this item from the array
					unset($cart[$cart_num]);

				}
			}

			//	Turn the array back into a string
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
