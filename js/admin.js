//Tracks what method the admin wants to use
//Can be add, edit, or remove
var clicked="";

//Figures out which database we are working with
if($("#adminProducts").hasClass("active"))
	var panel='product';
else if($("#adminUsers").hasClass("active"))
	var panel='user';
else if($("adminReviews").hasClass("active"))
	var panel='review';

//Fills in #adminForm
function fillForm(value){
	if(panel=='product'){//Different DBs have different cols
    	if(value=='addClear'){//Clears the inputs for add
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
    	}else{//Places the info in the inputs
	    	$("input[name='id']").val($("#"+value+"-productID").html());
	    	$("input[name='hiddenId']").val($("#"+value+"-productID").html());
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
    	if(value=='addClear'){//Clears the inputs for add
	    	$("input[name='id']").val("");
	    	$("input[name='username']").val("");
	    	$("input[name='pass']").val("");
	    	$("input[name='userAccess']").val("");
	    	$("input[name='first']").val("");
	    	$("input[name='last']").val("");
	    	$("input[name='email']").val("");
	    	$("input[name='address']").val("");
    	}else{//Places the info in the inputs
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

//Listener for add button
$("#adminAdd").click(function(){
	if(clicked=="add"){
		//Checks if this is our second time clicking add
		//If so, closes form
		$("#adminForm").addClass("hidden");
		$("#adminAdd").removeClass("btn-primary active");
		clicked="";
	}else{
		//If this is our first time clicking, opens the form and clears it
		fillForm('addClear');
		$("#adminForm input[type='text']").prop('disabled', false);
		$("#adminForm input[name='id']").prop('disabled', true);
		$("#adminForm").removeClass("hidden");
		$("#adminAdd").addClass("btn-primary active");
		$("#adminEdit").removeClass("btn-warning active");
		$("#adminRemove").removeClass("btn-danger active");
		$("#add-edit-button").val("Add "+panel);
		$("#add-edit-button").removeClass("btn-warning");
		$("#add-edit-button").removeClass("btn-danger");
		$("#add-edit-button").addClass("btn-primary");
		clicked="add";
	}
});

//Listener for edit button
$("#adminEdit").click(function(){
		if(clicked=="edit"){
			//Checks if this is our second time clicking edit
			//If so, closes form
			$("#adminForm").addClass("hidden");
			$("#adminEdit").removeClass("btn-warning active");
			clicked="";
		}else{
			//If this is our first time clicking,
			//opens the form and places info if radio is selected
			fillForm($('input:radio[name="sel"]:checked').val());
			$("#adminForm input[type='text']").prop('disabled', false);
			$("#adminForm input[name='id']").prop('disabled', true);
			$("#adminForm").removeClass("hidden");
			$("#adminEdit").addClass("btn-warning active");
			$("#adminAdd").removeClass("btn-primary active");
			$("#adminRemove").removeClass("btn-danger active");
			$("#add-edit-button").val("Edit "+panel);
			$("#add-edit-button").removeClass("btn-primary");
			$("#add-edit-button").removeClass("btn-danger");
			$("#add-edit-button").addClass("btn-warning");
			clicked="edit";

		}
});

//Listener for radio buttons
$("input[name='sel']").change(function(){
	//Changes the form values when clicked if it is not the add button
    if(clicked=='edit' || clicked=='remove' || clicked=='')
    	fillForm($('input:radio[name="sel"]:checked').val());
});

//Listener for remove button
$("#adminRemove").click(function(){
	if(clicked=="remove"){
			//Checks if this is our second time clicking remove
			//If so, closes form
			$("#adminForm").addClass("hidden");
			$("#adminRemove").removeClass("btn-danger active");
			clicked="";
		}else{
			//If this is our first time clicking,
			//opens the form and places info if radio is selected
			//and disables inputs
			fillForm($('input:radio[name="sel"]:checked').val());
			$("#adminForm input[type='text']").prop('disabled', true);
			$("#adminForm").removeClass("hidden");
			$("#adminRemove").addClass("btn-danger active");
			$("#adminAdd").removeClass("btn-primary active");
			$("#adminEdit").removeClass("btn-warning active");
			$("#add-edit-button").val("Delete "+panel);
			$("#add-edit-button").removeClass("btn-primary");
			$("#add-edit-button").removeClass("btn-warning");
			$("#add-edit-button").addClass("btn-danger");
			clicked="remove";

		}
});