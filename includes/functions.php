<?php

function print_stars($rating){
	
	$html = '';
	for($i = 0; $i < 5; $i++){
		$i < $rating ? $html .= '<span class="glyphicon glyphicon-star"></span>' : $html .= '<span class="glyphicon glyphicon-star-empty"></span>';
	}
	echo $html;
	
}

function pre_print_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

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
