jQuery(function($) {

	// This identifies your website in the createToken call below
	Stripe.setPublishableKey('pk_test_7u3S1b6vCyoZloGw6w7JuFKX');

	//	Callback function for the checkout form
	function stripeResponseHandler(status, response) {
	  var $form = $('#checkout-form');

	  if (response.error) {

	  	console.log(response.error);
	  	
	    // Show the errors on the form
	    $form.find('.payment-errors').text(response.error.message);
	    $form.find('button').prop('disabled', false);

	  } else {

	    // response contains id and card, which contains additional card details
	    var token = response.id;

	    console.log(response.id);

	    // Insert the token into the form so it gets submitted to the server
	    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
	    // and submit
	    $form.get(0).submit();
	  }
	};


	//	Handle Checkout Form Submissions	
  $('#checkout-form').submit(function(event) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });
});