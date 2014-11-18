<?php 
if (isset($_SESSION['logged_in'])) { 
	echo '
	<div class="container">
	
		
		<h4 class="marB-20">Leave a Product Review:</h4>
		<strong class="choice">How do you rate this product?</strong><br/>
		<span class="star-rating marB-20">
		   <input type="radio" name="rating" id="rating" value="1"><i></i>
		   <input type="radio" name="rating" id="rating" value="2"><i></i>
		   <input type="radio" name="rating" id="rating" value="3"><i></i>
		   <input type="radio" name="rating" id="rating" value="4"><i></i>
		   <input type="radio" name="rating" id="rating" value="5"><i></i>
		</span>

		

		<textarea rows="4" class="form-control" cols="50" name="review_content" id="review_content" form="reviewbox"></textarea>
		<form name="reviewbox" id="reviewbox" method="POST" action="">
		<input type="submit" class="btn btn-default marT-10 marB-20 mobile" name="submit" id="submit" value="Submit" />


	</div><!--End of Container-->
	<script src="http://assets.codepen.io/assets/libs/fullpage/jquery-ab8e840c3dad7ccf2deadb8c40d53bdb.js"></script>
	<script src="http://assets.codepen.io/assets/common/stopExecutionOnTimeout-047b9a24af18107ef03c13ebe317ccb3.js"></script>
	<script type="text/javascript">
	$(":radio").change(function () {
	    window.CP.stopExecutionOnTimeout(1);
	    $(".choice").text(this.value + " stars");
	});
	</script>
	<script>
	$("#submit").click(function(e) {
	  e.preventDefault();
	  var review_content = $("textarea#review_content").val(); 
	  var rating = $("input:radio[name=rating]:checked").val();
	  var dataString = "review_content="+review_content+"&rating="+rating;
	  $.ajax({
	    type:"POST",
	    data:dataString,
	    url:"serverscript.php",
	    success:function(data) {
	      alert(data);
	      location.reload();
	    }
	  });
	});
	</script>';
}
?>