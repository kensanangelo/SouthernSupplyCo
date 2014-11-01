$('#loginForm').on('submit', function(e) {

	var loginUser = document.getElementById('loginUser');
	var loginPass = document.getElementById('loginPass');

	if (loginUser.value==""){
		document.getElementById('loginError').innerHTML="Please enter your username to continue."

		e.preventDefault();
		e.returnValue = false;
	}else if (loginPass.value==""){
		document.getElementById('loginError').innerHTML="Please enter your password to continue."

		e.preventDefault();
		e.returnValue = false;
	}else
		e.returnValue = true;

});

$('#signupForm').on('submit', function(e) {

	var signupUser = document.getElementById('createUser');
	var signupEmail = document.getElementById('createEmail');
	var signupPass = document.getElementById('createPass');
	var signupConfirm = document.getElementById('createConfirm');

	if (signupUser.value==""){
		document.getElementById('signupError').innerHTML="Please enter your username to continue."

		e.preventDefault();
		e.returnValue = false;
	}else if (signupEmail.value==""){
		document.getElementById('signupError').innerHTML="Please enter your email to continue."

		e.preventDefault();
		e.returnValue = false;
	}else if (signupPass.value==""){
		document.getElementById('signupError').innerHTML="Please enter your password to continue."

		e.preventDefault();
		e.returnValue = false;
	}else if (signupConfirm.value==""){
		document.getElementById('signupError').innerHTML="Please confirm your password to continue."

		e.preventDefault();
		e.returnValue = false;
	}else if (signupPass.value!=signupConfirm.value){
		document.getElementById('signupError').innerHTML="Your password does not match in both fields."

		e.preventDefault();
		e.returnValue = false;
	}else{
		e.returnValue = true;
	}

});
