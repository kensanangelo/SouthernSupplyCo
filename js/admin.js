var clicked="";

if($("#adminProducts").hasClass("active"))
	var panel='product';
else if($("#adminUsers").hasClass("active"))
	var panel='user';
else if($("adminReviews").hasClass("active"))
	var panel='review';

function fillForm(value){
	if(panel=='product'){
    	if(value=='addClear'){
			$("input[name='id']").val("");
	    	$("input[name='name']").val("");
	    	$("input[name='desc']").val("");
	    	$("input[name='cat']").val("");
	    	$("input[name='SKU']").val("");
	    	$("input[name='stock']").val("");
	    	$("input[name='cost']").val("");
	    	$("input[name='price']").val("");
	    	$("input[name='sale']").val("");
	    	$("input[name='url']").val("");
	    	$("input[name='rating']").val("");
	    	$("input[name='numVotes']").val("");
    	}else{
	    	$("input[name='id']").val($("#"+value+"-productID").html());
	    	$("input[name='name']").val($("#"+value+"-productName").html());
	    	$("input[name='desc']").val($("#"+value+"-description").html());
	    	$("input[name='cat']").val($("#"+value+"-category").html());
	    	$("input[name='SKU']").val($("#"+value+"-SKU").html());
	    	$("input[name='stock']").val($("#"+value+"-stock").html());
	    	$("input[name='cost']").val($("#"+value+"-cost").html());
	    	$("input[name='price']").val($("#"+value+"-price").html());
	    	$("input[name='sale']").val($("#"+value+"-salePrice").html());
	    	$("input[name='url']").val($("#"+value+"-productImage").html());
	    	$("input[name='rating']").val($("#"+value+"-rating").html());
	    	$("input[name='numVotes']").val($("#"+value+"-numOfVotes").html());
    	}
    }else if(panel=='user'){
    	if(value=='addClear'){
	    	$("input[name='id']").val("");
	    	$("input[name='username']").val("");
	    	$("input[name='pass']").val("");
	    	$("input[name='userAccess']").val("");
	    	$("input[name='first']").val("");
	    	$("input[name='last']").val("");
	    	$("input[name='email']").val("");
	    	$("input[name='address']").val("");
    	}else{
	    	$("input[name='id']").val($("#"+value+"-id").html());
	    	$("input[name='username']").val($("#"+value+"-username").html());
	    	$("input[name='pass']").val($("#"+value+"-password").html());
	    	$("input[name='userAccess']").val($("#"+value+"-user_access").html());
	    	$("input[name='first']").val($("#"+value+"-first_name").html());
	    	$("input[name='last']").val($("#"+value+"-last_name").html());
	    	$("input[name='email']").val($("#"+value+"-email").html());
	    	$("input[name='address']").val($("#"+value+"-address").html());
    	}
    }

}

$("#adminAdd").click(function(){
	if(clicked=="add"){
		$("#adminForm").addClass("hidden");
		$("#adminAdd").removeClass("btn-primary active");
		clicked="";
	}else{
		fillForm('addClear');
		$("#adminForm").removeClass("hidden");
		$("#adminAdd").addClass("btn-primary active");
		$("#adminEdit").removeClass("btn-warning active");
		$("#add-edit-button").val("Add "+panel);
		$("#add-edit-button").removeClass("btn-warning");
		$("#add-edit-button").addClass("btn-primary");
		clicked="add";
	}
});

$("#adminEdit").click(function(){
		if(clicked=="edit"){
			$("#adminForm").addClass("hidden");
			$("#adminEdit").removeClass("btn-warning active");
			clicked="";
		}else{
			fillForm($('input:radio[name="sel"]:checked').val());
			$("#adminForm").removeClass("hidden");
			$("#adminEdit").addClass("btn-warning active");
			$("#adminAdd").removeClass("btn-primary active");
			$("#add-edit-button").val("Edit "+panel);
			$("#add-edit-button").removeClass("btn-primary");
			$("#add-edit-button").addClass("btn-warning");
			clicked="edit";

		}
});

$("input[name='sel']").change(function(){
    if(clicked=='edit' || clicked=='')
    	fillForm($('input:radio[name="sel"]:checked').val());
});

$("#adminRemove").click(function(){
	$("#adminForm").addClass("hidden");
	$("#adminRemove").addClass("btn-danger active");
	
	$("#adminAdd").removeClass("btn-primary active");
	$("#adminEdit").removeClass("btn-warning active");

	clicked="";
});