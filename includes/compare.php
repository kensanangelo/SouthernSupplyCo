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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connectdb.php';

    if (isset($_POST['login'])) {

        $user=$_POST['username'];
        $pass=$_POST['password'];

        $user = preg_replace("/[^A-Za-z0-9]/", " ", $user);
        $user = $connection->real_escape_string($user);

        $pass = preg_replace("/[^A-Za-z0-9]/", " ", $pass);
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

    } else if (isset($_POST['signup'])){
        echo "SIGNUP WORKED";
    }else
    	echo "It didnt work :(";
}

?>