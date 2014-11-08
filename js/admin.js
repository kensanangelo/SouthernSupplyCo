var clicked="";

$("#adminAdd").click(function(){
	if(clicked==""){
		$("#adminForm").removeClass("hidden");
		$("#adminAdd").addClass("btn-primary active");

		clicked="add";
	}else{
		if(clicked=="add"){
			$("#adminForm").addClass("hidden");
			$("#adminAdd").removeClass("btn-primary active");

			clicked="";
		}else{
			$("#adminAdd").addClass("btn-primary active");
			clicked="add";
		}
		$("#adminEdit").removeClass("btn-warning active");
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
    var id=$('input:radio[name="sel"]:checked').val() 
});

$("#adminRemove").click(function(){
	$("#adminForm").addClass("hidden");
	$("#adminRemove").addClass("btn-danger active");
	
	$("#adminAdd").removeClass("btn-primary active");
	$("#adminEdit").removeClass("btn-warning active");

	clicked="";
});