$("#submit").click(function(){
	//$(this).html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>')
	//$(this).html("<span class='glyphicon glyphicon-refresh animate'></span>");
	if(validate_form_4()){
		$(this).hide();
		$("#loading-div").show();
	}
	else{
		$(this).val("Finish");
		return false;
	}
});