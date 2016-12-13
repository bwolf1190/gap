function set_error_style(element){
	element.addClass('invalid');
}

function reset_style(element){
	if(element.hasClass('invalid')){
		element.removeClass('invalid');
		element.val("");
	}
}

function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}


$("input").focus(function(){
    reset_style($(this));
});

$('#same_address').click(function(){
    if($(this).is(":checked")){
    	$(this).val('checked');
        $("input[name=ma1]").val($("input[name=sa1]").val());
        $("input[name=ma2]").val($("input[name=sa2]").val());
        $("input[name=mcity]").val($("input[name=scity]").val());
        $("input[name=mstate]").val($("input[name=sstate]").val());
        $("input[name=mzip]").val($("input[name=szip]").val());
        $("input[name=ma1]").removeClass("invalid");
        $("input[name=mcity]").removeClass("invalid");
        $("input[name=mstate]").removeClass("invalid");
        $("input[name=mzip]").removeClass("invalid");
    }
    else if($(this).is(":not(:checked)")){
    	$(this).val('unchecked');
        $("input[name=ma1]").val("");
        $("input[name=ma2]").val("");
        $("input[name=mcity]").val("");
        $("input[name=mstate]").val("");
        $("input[name=mzip]").val(""); 	
    }
});

$('#terms_conditions').click(function(){
	if($(this).is(":checked")){
		$(this).val('checked');
		$('#terms-link')[0].click();
		$("#terms-link").css("color", "#00234C");
	}
	if($(this).is(":not(:checked)")){
		$(this).val("unchecked");
	}
});



function empty_check(name, message){
	var valid;
	var input = $("input[name=" + name + "]");
	var id = "#" + name;
	if(input.val() === ""){
		set_error_style(input);
		input.val(message);
		return "invalid";
	}
	else if($(id).hasClass("invalid")){
		return "invalid";
	}
	else{
		// state abbreviations should be uppercase not title case
		if(name !== "sstate" && name !== "mstate"){
			input.val(toTitleCase(input.val()));
		}

		return "valid";
	}

}

function validate_form_1(){
	//var valid;
	var acc_num = validate_acc_num();
	var fname = empty_check("fname", "Please enter your first name");
	var lname = empty_check("lname", "Please enter your last name");
	var ftid = validate_federal_tax_id_num();

	if(acc_num === "valid" && fname === "valid" && lname === "valid"){
		return true;
	}
	else{
		return false;
	}

}

function validate_form_2(){
	var sa1 = empty_check("sa1", "Please enter your service address");
	var scity = empty_check("scity", "Please enter your service city");
	var sstate = empty_check("sstate", "Please enter service state");
	var szip = validate_zip("szip");

	var sa2 = $("input[name=sa2]").val(toTitleCase($("input[name=sa2]").val()));

	if(sa1 === "valid" && scity === "valid" && sstate === "valid" && szip === "valid"){
		return true;
	}
	else{
		return false;
	}

}

function validate_form_3(){
	var ma1 = empty_check("ma1", "Please enter your mailing address");
	var mcity = empty_check("mcity", "Please enter your mailing city");
	var mstate = empty_check("mstate", "Please enter your mailing state");
	//var mzip = empty_check("mzip", "Please enter your mailing zip");
	var mzip = validate_zip("mzip");

	if(ma1 === "valid" && mcity === "valid" && mstate === "valid" && mzip === "valid"){
		return true;
	}
	else{
		return false;
	}

}


function validate_form_4(){
	var email = validate_email("Please enter a valid email address");
	var confirm_email = validate_confirm_email("Please enter a valid email address");
	var phone = validate_phone("Please enter a valid phone number");
	var check_terms = validate_terms();
	
	if(email === "valid" && confirm_email === "valid" && phone === "valid" && check_terms === "valid"){
		return true;
	}
	else{
		//alert(email + " " + confirm_email + " " + phone);
		return false;
	}
}


/**				FORM 1 						 **/
function validate_acc_num(){
	var valid;
	var length = $("input[name=format_criteria_1]");
	var prefix = $("input[name=format_criteria_2]");
	var acc_num = $("input[name=acc_num]");
	if(prefix === ""){
		var message = "Your account number or id must start with " + prefix.val() + " and be " + length.val() + " characters";
	}
	else{
		var message = "Your account number or id must be " + length.val() + " characters.";
	}
	acc_num.val(toTitleCase(acc_num.val()));

	if(acc_num.val().length === parseInt(length.val()) && acc_num.val().startsWith(prefix.val())){
		//alert("valid account number");
		valid = "valid";
	}
	else{
		set_error_style(acc_num);
		acc_num.val(message);
		valid = "invalid";
	}

	return valid;
}

function validate_federal_tax_id_num(){
	var valid;
	var ftid = $("#federal_tax_id_num");
	if(ftid.length){
		if(ftid.val() === ""){
			var message = "Please enter you Federal Tax Id number";
			ftid.val(message);
			set_error_style(ftid);
			valid = "invalid";
		}
		else{
			valid  = "valid";
		}
	}
	else{
		valid = "valid";
	}

	return valid;
}

function validate_zip(field){
	var valid;
	var zip = $("input[name=" + field + "]");
	var message = "Please enter a valid zip code";
    // strip all non-integer characters
    zip.val(zip.val().replace(/\D/g,''));

    if(zip.val().length === 5 || zip.val().length === 9){
    	valid = "valid"
    }
    else{
    	set_error_style(zip);
    	zip.val(message);
    	valid = "invalid";
    }

    return valid;
}

/**				FORM 4 						 **/
function validate_email(){
	var valid;
    var email = $("input[name=email]");
    
    // first part can contain uppercase and lowercase letters, dashes, underscores, and periods.  Must be 2 letters long.
    // second part starts with @ followed by uppercase or lowercase letters, underscores, periods
    // third part starts with . and can contain uppercase and lowercase letters.  Must be between 2-3 chars
    var email_re = /^\w[\w-.{2,}]+@[a-zA-Z._]+?\.[a-zA-Z]{2,3}$/;
    var message = "Please enter a valid email address";
    
    if(email.val().match(email_re)){
        valid = "valid";
    }
    else if(email.val() === ""){
    	set_error_style(email);
        email.val(message);
        valid = "invalid";   	
    }
    else{
    	set_error_style(email);
        email.val(message);
        valid = "invalid";
    }

    return valid;
}

function validate_confirm_email(){
	var valid;
	var email = $("input[name=email]");
	var confirm_email = $("input[name=confirm_email]");
	var message = "Please enter a valid email address";

	if(confirm_email.val() === "" || confirm_email.val() !== email.val()){
		set_error_style(confirm_email);
        confirm_email.val(message);
        valid = "invalid";		
	}
	else{
		valid = "valid";
	}

	return valid;
	
}

function validate_phone(){
	var valid;
    var phone = $("input[name=phone]");
    var message = "Please enter a valid phone number";
    var regex =  /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    // strip all non-integer characters
    phone.val(phone.val().replace(/\D/g,''));


    if(phone.val() == ""){
        phone.val(message);
    	set_error_style(phone);
		valid = "invalid";
    }
    else if(phone.val().match(regex)){
    	valid = "valid";
    }
    else{
        phone.val(message);
        set_error_style(phone);
        valid = "invalid";
    }

    return valid;
}

function validate_terms(){
	var valid;
	var check_terms = $("input[name=terms_conditions]");
	if(check_terms.is(":checked")){
		valid = "valid";
	}
	else{
		valid = "invalid";
		$("#terms-link").css("color", "#bf0000");
	}

	return valid;
}

