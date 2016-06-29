
//var current = 1;
var validation = true;

$(document).ready(function() {
	$("#form-group-1").show();
	scroll_to_div('#enroll_container');
	$("#loading-div").hide();
	$(document).ready(function(){
    	$('[data-toggle="tooltip"]').tooltip(); 
	});

	// prevent from scrolling to top of page when tooltip is clicked
	$('a#acc-num-tooltip').on('click', function(e) {e.preventDefault(); return true;});

});

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
})

$('.next').click(function(){
	get_form('next');
});

$('.previous').click(function(){
	get_form('previous');
});

function get_form(d){
	var direction;
	var current;

	if(d === 'previous'){
		direction = -1;;
	}
	else{
	     direction = 1;
	}

	if($('#form-group-1').css('display') == 'block'){
		var current = 2;
		$('#form-group-1').hide();
		var next = '#form-group-' + current.toString();
			
		if(!validation){
			$(next).show();
		}
		else if(validate_form_1()){
			$(next).show();
		}
		else{
			$('#form-group-1').show();
		}
		
		return;
		
	}
	else if($('#form-group-2').css('display') == 'block'){
		var current = 2;
		current = current + direction;
		$('#form-group-2').hide();
		var next = '#form-group-' + current.toString();

		if(!validation){
			$(next).show();
		}
		else if(validate_form_2()){
			$(next).show();
		}
		else{
			$("#form-group-2").show();
		}
		return;
	}
	else if($('#form-group-3').css('display') == 'block'){
		var current = 3;
		current = current + direction;
		$('#form-group-3').hide();
		var next = '#form-group-' + current.toString();

		if(!validation){
			if(next === '#form-group-4'){
				$('#next').hide();
				$('#submit').show();		
			}
			$(next).show();
		}

		if(validate_form_3()){
			if(next === '#form-group-4'){
				$('#next').hide();
				$('#submit').show();		
			}
			$(next).show();
		}
		else{
			$("#form-group-3").show();
		}
		return;
	}
	else if($('#form-group-4').css('display') == 'block'){
		var current = 4;
		current = current + direction;
		$('#form-group-4').hide();
		var next = '#form-group-' + current.toString();
		
		if(!validation){
			$(next).show();
			$('#next').show();
			$('#submit').hide();
		}
		else if(!validate_form_4()){
			$("#form-group-4").show();
		}
		else{
			$("#form-group-3").show();
			$('#next').show();
			$('#submit').hide();
		}
		return;
	}
	else{
		alert('error');
	}
}






