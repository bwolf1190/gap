$(document).ready(function(){$(".alert").addClass("in").fadeOut(4500);

	$('[data-toggle=collapse]').click(function(){
	  	// toggle icon
	  	$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
	});

	$('#submit-request').click(function(e){
		alert('clicked');
		e.preventDefault();
		var message = $('#message').val();
		var html = '<a href="#" class="list-group-item">' + message + '</a>';
		$('#new-requests').prepend(html);
		$('#message').val('');
	});

});