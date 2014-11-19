jQuery(document).ready(function(){

	var search_field = $('input[name="search_term"]');
	var results_list = $('#ajax-search-results');

	// On Search Submit and Get Results
	function search() {
	    var query_value = search_field.val();
	   // $('#search-string').html(query_value);
	    if(query_value !== '' && query_value.length > 2){
	        $.ajax({
	            type: "POST",
	            url: "includes/ajax_search.php",
	            data: { query: query_value },
	            cache: false,
	            success: function(result){
	            	//console.log(result);
	               	data = result;
	               	// console.log(data);

	               	if(!data){
	               		$('#ajax-search-results').html('');

	               	}else {

	               		var html = '<ul class="list-group">';

               			$.each(data, function(i, product){
		               		html += '<li class="list-group-item"><a href="product.php?product='+product.productID+'">Name: '+product.productName+' | '+product.category+'</a></li>';

		               	});
						
						html += '</ul>';

		               	$('#ajax-search-results').html(html);
	               	}
	               
	            }
	        });
	    }return false;
	}


	search_field.on("keyup", function(e) {

		console.log('keyup');
	    // Set Timeout
	    clearTimeout($.data(this, 'timer'));

	    // Set Search String
	    var search_string = $(this).val();

	    // Do Search
	    if (search_string == '') {
	        results_list.fadeOut();
	        $('h4#results-text').fadeOut();
	    }else{
	        $('h4#results-text').fadeIn();
	        $(this).data('timer', setTimeout(search, 100));
	        results_list.fadeIn();

	    };
	});

	// =- =- =- =- =- =- =-
	//	
	//	Logout Form Submit
	//
	// =- =- =- =- =- =- =- =-

	$('#logout-form').on('submit', function(evt) {
		console.log('submitted');
		evt.preventDefault();
			
		var form = $(this),
			btn = $('#logout-button'),
			form_container = $('#form-container');
				
		//send	
		$.ajax({
			url: 'includes/ajax/process_logout.php',
			type: 'POST',
			data: form.serialize(),
			success: function(result) {

				console.log(result);
				var data = result;
		
				// The ajax response returns data.code = 1 if the login was successful
				if( data.code && data.code == 1 ) {
					
					// window.location = 'http://localhost:8888/ssc/home.php';
					window.location = 'http://sulley.cah.ucf.edu/~ke571033/dig4530c/A/home.php';
					// console.log(data.message);

				}
				
			}
		});
		
		return false;
			
	});

	// Attach Logout Function to the form (in case the form has been added to the DOM dynamically)
	function attach_logout_event(){
		// =- =- =- =- =- =- =-
		//	
		//	Logout Form Submit
		//
		// =- =- =- =- =- =- =- =-

		$('#logout-form').on('submit', function(evt) {
			console.log('submitted');
			evt.preventDefault();
				
			var form = $(this),
				btn = $('#logout-button'),
				form_container = $('#form-container');
					
			//send	
			$.ajax({
				url: 'includes/ajax/process_logout.php',
				type: 'POST',
				data: form.serialize(),
				success: function(result) {

					console.log(result);
					var data = result;
			
					// The ajax response returns data.code = 1 if the login was successful
					if( data.code && data.code == 1 ) {
						
						// window.location = 'http://localhost:8888/ssc/home.php';
						window.location = 'http://sulley.cah.ucf.edu/~je860731/dig4530c/A/home.php';
						// console.log(data.message);
				
					}
					
				}
			});
			
			return false;
				
		});
	}
	
});