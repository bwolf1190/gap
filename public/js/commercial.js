$(function() { 
    $('#zip-form').on('submit', function(e) { 
        e.preventDefault(); 
        var data = $("#zip-form :input").serializeArray();
        console.log(data); 
    });

    $('#zip-form-sm').on('submit', function(e) {
        e.preventDefault();  
        var data = $("#zip-form-sm :input").serializeArray();
        console.log(data); 
    });
});