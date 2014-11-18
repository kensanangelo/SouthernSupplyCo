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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {//If the user clicked login
	include 'connectdb.php';

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
				if($user_access>2)
					$message .= '<a href="admin.php">Take me to the <strong>Admin Panel.</strong></a>';
				else
					$message .= '<a href="client.php?user_id='.$user_id.'">Take me to <strong>My Account.</strong></a>';

				$_SESSION['logged_in'] = 1;
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_access'] = $user_access;

				$html = '<a class="user-mgmt-btn" id="account-button" href="client.php?user_id='.$user_id.'">';
				$html .= "<span class='glyphicon glyphicon-user'></span><span>Account</span>";
				$html .= "</a>";

				$html .= '<form method="POST" id="logout-form">';
				$html .= '<button class="user-mgmt-btn" type="submit" id="logout-button">';
				$html .= '<span class="glyphicon glyphicon-user"></span><span>Log Out</span>';
				$html .= '</button>';
				$html .= '</form>';

				$html .= '<a class="user-mgmt-btn" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>';

				header('Content-Type: application/json');
				die(json_encode(array(
					'code' => 1,
					'message' => $message,
					'query' => $query,
					'user_id' => $user_id,
					'loginSuccess' => $loginSuccess,
					'user_access' => $user_access,
					'html' => $html
				)));

			}else{

				header('Content-Type: application/json');
				die(json_encode(array(
					'code' => 0,
					'message' => '<h3 id="error">Your username or password was incorrect.</h3>',
					'loginSuccess' => false
				)));
			}

		}
		else{
			header('Content-Type: application/json');
				die(json_encode(array(
					'code' => 0,
					'message' => '<h3 id="error">You did not fill out all of the fields.</h3>',
					'loginSuccess' => false
				)));
		}

	
}

?>