<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['user_access']);
$_SESSION['logged_in'] = 0;

$message = '<h3>You have been logged out.</h3>';
$message .= '<p>Thank you for visiting Southern Supply Company</p>';
$_SESSION['logout_msg'] = $message;

header('Content-Type: application/json');
die(json_encode(array(
	'code' => 1,
	'message' => $message
)));