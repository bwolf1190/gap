$(function() { 


});

function meter_modal(type){
    if(type === 'Commercial'){
        alert('testy');
    }

}

function clicky(e){
    e.preventDefault();
    setTimeout(function(){ e.click(); }, 18000);
}