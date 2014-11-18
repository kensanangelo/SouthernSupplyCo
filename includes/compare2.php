<?php
session_start();

function signupAdd($user,$email,$pass)
{
	include 'CRUD.php';

	$array = array($user, $pass, 2, '', '', $email, '', '');

	$success = addToDB('users',$array);

	return $success;	
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//If the user clicked login
	include 'connectdb.php';

		$user = $_POST['createUser'];
		$email = $_POST['createEmail'];
		$pass = $_POST['signhash'];
		$passConfirm = $_POST['signhash2'];

		$user = $connection->real_escape_string($user);
		$pass = $connection->real_escape_string($pass);
		$passConfirm = $connection->real_escape_string($passConfirm);
		$email = $connection->real_escape_string($email);

		
		if(empty($user)==false && empty($pass)==false && empty($passConfirm)==false && empty($email)==false){

			if ($pass==$passConfirm) {
				$signupSuccess = signupAdd($user,$email,$pass);

				if($signupSuccess == "Success"){

					$message = '<h3>Congratulations, your account has been successfully created!</h3>';

					header('Content-Type: application/json');
					die(json_encode(array(
						'code' => 1,
						'message' => $message
					)));

				} else {

					$message = '<h3 id="error">'.$signupSuccess.' - Your account failed to be created.</h3>';

					// header('Content-Type: application/json');
					die(json_encode(array(
						'code' => 0,
						'message' => $message
					)));
				}
			}
			else{
				$message = '<h3 id="error">Your password fields did not match</h3>';

					// header('Content-Type: application/json');
					die(json_encode(array(
						'code' => 0,
						'message' => $message
					)));
			}
		}
		else{
			$message = '<h3 id="error">You must fill out all fields.</h3>';

					header('Content-Type: application/json');
					die(json_encode(array(
						'code' => 0,
						'message' => $message
					)));
		}
}

?>