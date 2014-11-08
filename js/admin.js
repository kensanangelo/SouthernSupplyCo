var clicked=false;

$("#adminAdd").click(function(){
	if(clicked==false){
		$("#adminForm").removeClass("hidden");
		$("#adminAdd").addClass("btn-primary active");

		clicked=true;
	}else if(clicked==true){
		$("#adminAdd").addClass("btn-primary active");

		$("#adminEdit").removeClass("btn-warning active");
		$("#adminEdit").addClass("btn-default");


		$("#adminRemove").removeClass("btn-danger active");
		$("#adminRemove").addClass("btn-default");

	}
});

$("#adminEdit").click(function(){
	if(clicked==false){
		$("#adminForm").removeClass("hidden");
		$("#adminEdit").addClass("btn-warning active");

		clicked=true;
	}else if(clicked==true){
		$("#adminEdit").addClass("btn-warning active");
		$("#adminAdd").addClass("btn-default");
		$("#adminAdd").removeClass("btn-primary active");
		$("#adminRemove").addClass("btn-default");
		$("#adminRemove").removeClass("btn-danger active");
	}
});

$("#adminRemove").click(function(){
	if(clicked==false){
		$("#adminForm").toggleClass("hidden");
		$("#adminRemove").addClass("btn-danger active");

		clicked=true;
	}else if(clicked==true){
		$("#adminRemove").addClass("btn-danger active");
		$("#adminEdit").addClass("btn-default");
		$("#adminEdit").removeClass("btn-warning active");
		$("#adminAdd").addClass("btn-default");
		$("#adminAdd").removeClass("btn-primary active");
	}
});