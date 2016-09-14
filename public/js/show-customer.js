$(document).ready(function(){
	$("nav").hide();
	$("#sidebar").hide();
	$("footer").hide();
	$('.remodal-overlay').unbind('click.remodal');
	var modal = $('[data-remodal-id=modal]').remodal();
    modal.open();
});