
function scroll_to_div(div){
  div = $(div);
  $('html,body').animate({scrollTop: div.offset().top},'slow');
}

function set_sidebar(){
  $('#enroll').click(function(){
    scroll_to_div('.content');
  });
}

$(document).ready(function() {

    var $footer = $("#footer"),
        $window    = $(window),
        topPadding = 0;

        //$sidebar.css('top', $('#header').offset().top + $sidebar.height());

    //alert($window.scrollTop());
    $window.scroll(function() {
        //if (($(window).scrollTop() > $('#sidebar').offset().top) && (($('#sidebar').offset().top + $('#sidebar').height()) >= ($(window).height() + $('#footer').offset().top))) {
        //if ((($(window).scrollTop() > offset.top) || ($('#sidebar').offset().top > ($(window).scrollTop() + $(window).height() - 800)))) {
         // if (($(window).scrollTop() > offset.top) || (offset.top > $('#footer').offset().top)){
            //alert("true");


    var div = $(".content");
    //Take the current position (vertical position from top) of your div in the variable

       var windowpos = $window.scrollTop();
       //Now if you scroll more than 100 pixels vertically change the class to AfterScroll
       // I am taking 100px scroll, you can take whatever you need
       if (windowpos === 0) {
         div.addClass('BeforeScroll');
         div.removeClass("AfterScroll");
         div.removeClass("fade-in");
       }
       //If scroll is less than 100px, remove the class AfterScroll so that your content will be hidden again 
       else{
        //alert("scroll is 0");
         div.removeClass('BeforeScroll');
         div.addClass("AfterScroll");
         div.addClass("fade-in");
       }
       });
});


