<?php
session_start();
?>
<?php
  include 'includes.php';

  $user_id = mysqli_real_escape_string($connection,$_SESSION['user_id']);
  $product_id = mysqli_real_escape_string($connection,$_SESSION['current_product']);

  mysqli_select_db($connection,"users");
  $sql="SELECT * FROM `users` WHERE `id` = '".$user_id."'";
  $result = mysqli_query($connection,$sql);
  $exists = mysqli_fetch_array($result);
  $username = $exists['username'];

  $review_content = $_POST['review_content'];
  $review_content = mysqli_real_escape_string($connection,$review_content);
  $rating = $_POST['rating'];
  $rating = mysqli_real_escape_string($connection,$rating);
  $insert = "INSERT INTO reviews (`user_id`, `product_id`, `rating`, `review_content`, `username`) VALUES ('$user_id', '$product_id', '$rating', '$review_content', '$username')";
  mysqli_query($connection, $insert);
  echo 'Thanks for your review!';
?>