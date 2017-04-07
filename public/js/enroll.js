
//var current = 1;
var validation = true;

	/*$('#upload-btn').change(function(){
		var file = $('#upload-btn').val();
		var n = file.lastIndexOf('/');
		var result = file.substring(n + 1);
		$('#filename').html(result);

		$('#filename').html($('#upload-btn').val().substring($('#upload-btn').val().lastIndexOf('/') + 1));
	});*/

$(document).ready(function() {
	// shill fix for ie not supporting startsWith
	if (!String.prototype.startsWith) {
	  String.prototype.startsWith = function(searchString, position) {
	    position = position || 0;
	    return this.indexOf(searchString, position) === position;
	  };
	}

	$("#form-group-1").show();
	scroll_to_div('#enroll_container');
	$("#loading-div").hide();
	$(document).ready(function(){
    	$('[data-toggle="popover"]').popover(); 
	});

	$('#enrollment-form').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13) { 
	    e.preventDefault();
	    return false;
	  }
	});

	// prevent from scrolling to top of page when tooltip is clicked
	$('a#acc-num-tooltip').on('click', function(e) {e.preventDefault(); return true;});

	// close popover on click outside
	$('body').on('click', function (e) {
	    $('[data-toggle=popover]').each(function () {
	        // hide any open popovers when the anywhere else in the body is clicked
	        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
	            $(this).popover('hide');
	        }
	    });
	});
});

$("#submit").click(function(){
	//$(this).html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>')
	//$(this).html("<span class='glyphicon glyphicon-refresh animate'></span>");
	if(validate_form_4()){
		$(this).hide();
		$("#previous-container").hide();
		$("#loading-div").show();
	}
	else{
		$(this).val("Finish");
		return false;
	}
});

$('.next').click(function(){
	get_form('next');
});

$('.previous').click(function(){
	if($('#form-group-1').css('display') != 'block'){
		get_form('previous');
	}
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
			scroll_to_div(next, 200);
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
			scroll_to_div(next, 200);
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
			scroll_to_div(next, 200);
		}

		if(validate_form_3()){
			if(next === '#form-group-4'){
				$('#next').hide();
				$('#submit').show();		
			}
			$(next).show();
			scroll_to_div(next, 200);
		}
		else{
			$("#form-group-3").show();
			scroll_to_div(next, 200);
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
			scroll_to_div(next, 200);
		}
		else{
			$("#form-group-3").show();
			$('#next').show();
			scroll_to_div(next, 200);
			$('#submit').hide();
		}
		return;
	}
	else{
		alert('error');
	}
}






