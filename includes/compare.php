<?php


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

function signupCheck()
{
	
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//If the user clicked login
	include 'connectdb.php';

	if (isset($_POST['login'])) {

		$user=$_POST['loginUser'];
		$pass=$_POST['loginPass'];

		$user = $connection->real_escape_string($user);
		$pass = $connection->real_escape_string($pass);
		
		if($user!=NULL && $pass != NULL){
			$loginSuccess=loginCheck($user,$pass);
			//Returns true if they logged in correctly
			//Put user login logic here
			if ($loginSuccess==true) {
				echo "YOU LOGGED IN CORRECTLY";
			}else{
				echo "YOU FAILED TO LOGIN IN BRO";
			}

		}
		else{
			//Put login fail code here
			echo "FAILED TO ENTER INFO BRO";
		}

	} else if (isset($_POST['signup'])){//If the user clicked signup

		$user=$_POST['createUser'];
		$email=$_POST['createEmail'];
		$pass=$_POST['createPass'];
		$passConfirm=$_POST['createConfirm'];

		$user = $connection->real_escape_string($user);
		$pass = $connection->real_escape_string($pass);
		$passConfirm = $connection->real_escape_string($passConfirm);
		$email = $connection->real_escape_string($email);
		
		if($user && $pass && $passConfirm && $email){

			if ($pass==$passConfirm) {
				echo "CREATE ACCOUNT SUCCEDES";
			}
			else{
				echo "YOUR PASSWORDS DIDNT MATCH";
			}
		}
		else{
				echo "YOU MUST ENTER ALL FIELDS";
		}
	}else
		echo "It didnt work :(";
}

?>