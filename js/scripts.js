jQuery(document).ready(function(){

	var search_field = $('input[name="search_term"]');
	var results_list = $('#ajax-search-results');

	// On Search Submit and Get Results
	function search() {
	    var query_value = search_field.val();
	   // $('#search-string').html(query_value);
	    if(query_value !== ''){
	        $.ajax({
	            type: "POST",
	            url: "includes/ajax_search.php",
	            data: { query: query_value },
	            cache: false,
	            success: function(result){
	            	//console.log(result);
	               	data = JSON.parse(result);
	               	console.log(data);

	               	if(!data){
	               		$('#ajax-search-results').html('');

	               	}else {

	               		var html = '<ul class="list-group">';

               			$.each(data, function(i, product){
		               		html += '<li class="list-group-item"><a href="catalog.php?product='+product.productID+'">Name: '+product.productName+' | '+product.category+'</a></li>';

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





	
});