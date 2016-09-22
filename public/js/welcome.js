function hover(element) {
    element.attr('src', element.attr('src').replace(/\.png/, '') + '-hover.png');
}
function unhover(element) {
    element.attr('src', element.attr('src').replace(/\-hover.png/, '') + '.png');
}
	$('.img-responsive').mouseover = function(e){
		hover(e);
	};

	$('.img-responsive').mouseout = function(e){
		unhover(e);
	};

$(document).ready(function() {
	$('.img-responsive').mouseover = function(e){
		hover(e);
	};

	$('.img-responsive').mouseout = function(e){
		unhover(e);
	};

	// clear value of zip input field on click
	$("input[name=zip]").click(function(e){
       $(this).val("");
    });

});
