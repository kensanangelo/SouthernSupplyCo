<?php
session_start();

function loginCheck($user, $pass){
	include 'CRUD.php';

	$DBuserInfo=mysqli_fetch_assoc(readFromDB("users", "*", "username='".$user."'"));
	$DBname=$DBuserInfo['username'];
	$DBpass=$DBuserInfo['password'];

	if ($user==$DBname && $pass==$DBpass){
		return true;
	}
	else{
		return false;
	}
}

function signupAdd($user,$email,$pass)
{
	include 'CRUD.php';

	$array=array($user,$pass,2,"namey","lastnamey",$email,"address",'');

	$success=addToDB('users',$array);

	return $success;	
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//If the user clicked login
	include 'connectdb.php';

	if (isset($_POST['login'])) {

		$user=$_POST['loginUser'];
		$pass=$_POST['loghash'];

		$user = $connection->real_escape_string($user);
		$pass = $connection->real_escape_string($pass);
		
		if($user!=NULL && $pass != NULL){

			$loginSuccess=loginCheck($user,$pass);

			//Returns true if they logged in correctly
			//Put user login logic here
			if ($loginSuccess==true) {	

				// Query the database for a user matching the username posted to the server
				$query = "SELECT * FROM users WHERE username='$user'";
				$results = $connection->query($query);

				$user_results = mysqli_fetch_assoc($results);
				$user_id = $user_results['id'];
				$user_access = $user_results['user_access'];

				//	Set up a message to be appended to the html via AJAX at the bottom of login.php
				$message = '<h3>Welcome, '.$user.'! You Have Successfully Logged In</h3>';
				$message .= '<p>Your User ID is: '.$user_id.'</p>';
				$message .= '<p>Your User Access is: '.$user_access.'</p>';
				$message .= '<a href="client.php">Take me to <strong>My Account</strong></a></p>';

				//	Store login data in the Session (Not working through ajax... it only stores when I set it outside AJAX requests)
				$_SESSION['logged_in'] = 1;
				$_SESSION['user_id'] = $user_id;

				header('Content-Type: application/json');
				die(json_encode(array(
					'code' => 1,
					'message' => $message,
					'query' => $query,
					'user_id' => $user_id,
					'loginSuccess' => $loginSuccess
				)));

				// echo "YOU LOGGED IN CORRECTLY";

			}else{

				// $_SESSION['logged_in'] = 0;
				// unset($_SESSION['user_id']);

				header('Content-Type: application/json');
				die(json_encode(array(
					'code' => 0,
					'message' => '<h3>YOU FAILED TO LOGIN IN BRO</h3>',
					'post' => $_POST,
					'user_id' => $user_id,
					'loginSuccess' => $loginSuccess
				)));

				// echo "YOU FAILED TO LOGIN IN BRO";
			}

		}
		else{
			//Put login fail code here
			echo "FAILED TO ENTER INFO BRO";
		}

	} else if (isset($_POST['signup'])){//If the user clicked signup
		$user=$_POST['createUser'];
		$email=$_POST['createEmail'];
		$pass=$_POST['signhash'];
		$passConfirm=$_POST['signhash2'];

		$user = $connection->real_escape_string($user);
		$pass = $connection->real_escape_string($pass);
		$passConfirm = $connection->real_escape_string($passConfirm);
		$email = $connection->real_escape_string($email);
		
		if($user && $pass && $passConfirm && $email){

			if ($pass==$passConfirm) {
				$signupSuccess=signupAdd($user,$email,$pass);

				if($signupSuccess=="Success")
					echo "YOU WERE ADDED TO THE DATABASE!";
				else
					echo $signupSuccess." - You werent added to the database :(";
			}
			else{
				echo "YOUR PASSWORDS DIDNT MATCH";
			}
		}
		else{
				echo "YOU MUST ENTER ALL FIELDS";
		}
	}else
		echo "404: It didnt work :(";
}

?>