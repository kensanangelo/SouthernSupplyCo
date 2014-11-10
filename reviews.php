<?php
include 'includes/connectdb.php';

if (!$connection) {
  die('Could not connect: ' . mysqli_error($connection));
}

mysqli_select_db($connection,"reviews");
$sql="SELECT * FROM `reviews` WHERE `product_id` = '".$product_id."'";
$result = mysqli_query($connection,$sql);
$exists = mysqli_fetch_array($result);

if (!$exists) {
	echo "No Reviews Yet!";
}

else {
	$result = mysqli_query($connection,$sql);

	echo '<h4>('.$review_count.') Product Reviews:</h4>';
	echo "<table class='review-table'>
	<tr>
	<th>Username</th>
	<th>Review</th>
	<th>Rating</th>
	</tr>";

	while($line = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td>" . $line['username'] . "</td>";
	  echo "<td>" . $line['review_content'] . "</td>";
	  echo "<td>" . $line['rating'] . " stars</td>";
	  echo "</tr>";
	}
	echo "</table>";
}

$result = mysqli_query($connection,$sql);
$exists = mysqli_fetch_array($result);

if ((isset($_SESSION['logged_in']) == 1) && ($_SESSION['user_id'] == $exists['user_id']))  { echo '
	<br/><h3>YOU ALREADY LEFT A REVIEW</h3>';
	$_SESSION['reviewed'] = array();
	$_SESSION['reviewed'][$product_id] = $product_id;
}

?>