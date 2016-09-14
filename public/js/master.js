
function scroll_to_div(div, offset){
	offset = offset || 0;
 	div = $(div);
 	$('html,body').animate({scrollTop: div.offset().top - offset},'slow');
}

function set_sidebar(){
 	$('#enroll').click(function(){
    	scroll_to_div('.content');
  	});
}

$(document).ready(function() {

 	// pulls the collapsed nav menu to the right side of the page
 	$('.slicknav_nav').addClass('pull-right');

});


