$('#loginForm').on('submit', function(e) {

	console.log("Test successful");

	var user = document.getElementById('loginUser');
	var pass = document.getElementById('loginPass');
	if (!user && !pass){
		e.preventDefault();
		e.returnValue = false;
		console.log("Failed Bro");
	}else
		console.log("SWEET SUCCESS");

});

