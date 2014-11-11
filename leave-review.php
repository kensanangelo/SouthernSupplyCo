<?php 
if (isset($_SESSION['logged_in'])) { 
	echo '
	<br/><br/>
	<textarea rows="4" cols="50" name="review_content" id="review_content" form="reviewbox"></textarea>
	<form name="reviewbox" id="reviewbox" method="POST" action="">
	 <input type="submit" name="submit" id="submit" value="Submit" />
	</form><br/>
	<br/><br/>
	<strong class="choice">Choose a rating:</strong><br/>
	<span class="star-rating">
	   <input type="radio" name="rating" id="rating" value="1"><i></i>
	   <input type="radio" name="rating" id="rating" value="2"><i></i>
	   <input type="radio" name="rating" id="rating" value="3"><i></i>
	   <input type="radio" name="rating" id="rating" value="4"><i></i>
	   <input type="radio" name="rating" id="rating" value="5"><i></i>
	</span>
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
	    }
	  });
	});
	</script>';
}
?>