<?php

	//Function that adds a line to the database
	//You have to pass values in as an array. Make sure it has the right amount of values and the right datatypes
	function addToDB($table, $values)
	{
		include 'connectdb.php';

		if($table=="products"){
			$query="INSERT INTO products (`productID`, `productName`, `description`, `category`, `SKU`, `stock`, `cost`, `price`, `salePrice`, `productImage`, `rating`) VALUES ($values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8],$values[9],$values[10]) 
				or die(mysqli_error($connection)";
		}else if($table=="users"){
			$query="INSERT INTO users (`id`, `username`, `password`, `user_access`, `salt`, `first_name`, `last_name`, `address`, `cart`) VALUES ($values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6],$values[7],$values[8]) 
				or die(mysqli_error($connection)";
		}

		$results=mysqli_query($connection, $query);

		mysqli_close($connection);

		if($results){
		    return "Success"; 
		}else{
			return "Failure";	 
		}

	}

	//Function that reads from database
	//If you don't want where, pass it as FALSE
	function readFromDB($table, $value, $where)
	{

		include 'connectdb.php';

		if($where==false)
			$query='SELECT '.$value.' FROM '.$table;
		else
			$query='SELECT '.$value.' FROM '.$table.' WHERE '.$where;
	
		$results=mysqli_query($connection, $query);

		mysqli_close($connection);

		if($results){
		    return $results; 
		}else{
			return "Failure";	 
		}	
	}

	//Function to update values in the database
	function changeInDB($table, $value, $where)
	{
		include 'connectdb.php';

		$query="UPDATE $table SET $value WHERE $where";

		$results=mysqli_query($connection, $query);

		mysqli_close($connection);

		if($results){
		    return "Success"; 
		}else{
			return "Failure";	 
		}
	}

	//Removes values from the database
	function removeFromDB($table, $value, $where)
	{
		include 'connectdb.php';

		$query="DELETE $value FROM $table WHERE $where";

		$results=mysqli_query($connection, $query);

		mysqli_close($connection);

		if($results){
		    return "Success"; 
		}else{
			return "Failure";	 
		}
	}
?>