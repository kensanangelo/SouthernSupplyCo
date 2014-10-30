<?php


function compareInfo($user, $pass){
	echo "IT WORKED!>!!>!> :)))))";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['login'])) {

        $user=$_POST['username'];
        $pass=$_POST['password'];
        
        if($user!=NULL && $pass != NULL)
	        compareInfo($user,$pass);
	    else
	    	echo "FAILED TO ENTER INFO BRO";

    } else if (isset($_POST['signup'])){
        echo "SIGNUP WORKED";
    }else
    	echo "It didnt work :(";
}

?>