
	// =- =- =- =- =- =- =-
	//	
	//	Login Form Submit
	//
	// =- =- =- =- =- =- =- =-

$('#loginForm').on('submit', function(e) {
	e.preventDefault();

	var loginUser = document.getElementById('loginUser');
	var loginPass = document.getElementById('loginPass');

	var form = $(this),
		btn = form.find('#login-submit'),
		successMsg = $('#form-success'),
		form_container = $('#form-container');

	if (loginUser.value==""){
		successMsg.html("<h3 id='error'>Please enter your username to continue.</h3>");

	}else if (loginPass.value==""){
		successMsg.html("<h3 id='error'>Please enter your password to continue.</h3>");

	}else{
		document.getElementById('loghash').value=CryptoJS.SHA256(loginPass.value);
			
		//send	
		$.ajax({
			url: 'includes/compare1.php',
			type: 'POST',
			data: form.serialize(),
			success: function(result) {

				console.log(result);
				var data = result;
				
				// The ajax response returns data.code = 0 if the login failed
				if( data.code == 0 ) {
					successMsg.html(data.message);
				}
				
				// The ajax response returns data.code = 1 if the login was successful
				if( data.code && data.code == 1 ) {
					
					form.find('input[type=text], texarea').val('').trigger('blur');
					form_container.slideUp();
					successMsg.html(data.message);

					if(data.loginSuccess){
						$('#user-mgmt').fadeOut(300, function(){
							$('#user-mgmt').html(data.html).fadeIn(300);
							attach_logout_event();
						});
						
					}
			
				}
				
			}
		});
	}

	return false;

});

	// =- =- =- =- =- =- =-
	//	
	//	Registration Form Submission
	//
	// =- =- =- =- =- =- =- =-

$('#signupForm').on('submit', function(e) {
	e.preventDefault();

	var form = $(this),
			btn = form.find('#login-submit'),
			successMsg = $('#form-success'),
			form_container = $('#form-container');

	var signupUser = document.getElementById('createUser');
	var signupEmail = document.getElementById('createEmail');
	var signupPass = document.getElementById('createPass');
	var signupConfirm = document.getElementById('createConfirm');

	if (signupUser.value==""){
		successMsg.html("<h3 id='error'>Please enter your username to continue.</h3>");

	}else if (signupEmail.value==""){
		successMsg.html("<h3 id='error'>Please enter your email to continue.</h3>");

	}else if (signupPass.value==""){
		successMsg.html("<h3 id='error'>Please enter your password to continue.</h3>");

	}else if (signupConfirm.value==""){
		successMsg.html("<h3 id='error'>Please confirm your password to continue.</h3>");

	}else if (signupPass.value!=signupConfirm.value){
		successMsg.html("<h3 id='error'>Your password does not match in both fields.</h3>");

	}else{
		document.getElementById('signhash').value=CryptoJS.SHA256(signupPass.value);
		document.getElementById('signhash2').value=CryptoJS.SHA256(signupConfirm.value);		
				
		//send	
		$.ajax({
			url: 'includes/compare2.php',
			type: 'POST',
			data: form.serialize(),
			success: function(result) {

				var data = result;
				
				// The ajax response returns data.code = 0 if the login failed
				if( data.code == 0 ) {
					successMsg.html(data.message);
				}
				
				// The ajax response returns data.code = 1 if the login was successful
				if( data.code && data.code == 1 ) {
					
					form.find('input[type=text], texarea').val('').trigger('blur');
					form_container.slideUp();
					successMsg.html(data.message);

					if(data.loginSuccess){
						$('#login-button').fadeOut(300, function(){
							$('#login-button .button-txt').html('Log Out');
							$('#login-button').attr('href', 'login.php?mode=logout').fadeIn(300);
						});
						
					}
			
				}
				
			}
		});

	}

	return false;
});
