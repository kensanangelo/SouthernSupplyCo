var clicked="";

if($("#adminProducts").hasClass("active"))
	var panel='products';
else if($("#adminUsers").hasClass("active"))
	var panel='users';
else if($("adminReviews").hasClass("active"))
	var panel='reviews';

$("#adminAdd").click(function(){
	if(clicked=="add"){
		$("#adminForm").addClass("hidden");
		$("#adminAdd").removeClass("btn-primary active");
		clicked="";
	}else{
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
		$("#adminForm").removeClass("hidden");
		$("#adminAdd").addClass("btn-primary active");
		$("#adminEdit").removeClass("btn-warning active");
		clicked="add";
	}
});

$("#adminEdit").click(function(){
		if(clicked=="edit"){
			$("#adminForm").addClass("hidden");
			$("#adminEdit").removeClass("btn-warning active");
			clicked="";
		}else{
			$("#adminForm").removeClass("hidden");
			$("#adminEdit").addClass("btn-warning active");
			$("#adminAdd").removeClass("btn-primary active");
			clicked="edit";

		}
});

$("input[name='sel']").change(function(){
    var id=$('input:radio[name="sel"]:checked').val();
    console.log(id);

    if(panel=='products' && (clicked=='edit' || clicked=='')){
    	$("input[name='id']").val($("#"+id+"-productID").html());
    	$("input[name='name']").val($("#"+id+"-productName").html());
    	$("input[name='desc']").val($("#"+id+"-description").html());
    	$("input[name='cat']").val($("#"+id+"-category").html());
    	$("input[name='SKU']").val($("#"+id+"-SKU").html());
    	$("input[name='stock']").val($("#"+id+"-stock").html());
    	$("input[name='cost']").val($("#"+id+"-cost").html());
    	$("input[name='price']").val($("#"+id+"-price").html());
    	$("input[name='sale']").val($("#"+id+"-salePrice").html());
    	$("input[name='url']").val($("#"+id+"-productImage").html());
    	$("input[name='rating']").val($("#"+id+"-rating").html());
    	$("input[name='numVotes']").val($("#"+id+"-numOfVotes").html());
    }
    
});

$("#adminRemove").click(function(){
	$("#adminForm").addClass("hidden");
	$("#adminRemove").addClass("btn-danger active");
	
	$("#adminAdd").removeClass("btn-primary active");
	$("#adminEdit").removeClass("btn-warning active");

	clicked="";
});