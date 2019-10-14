//Called, whenever user presses singuplogin
function signupLogin() {
	var currentUrl = window.location.href;
	popUrl = "signupLogin.php?userTo="+currentUrl;
	popitup(popUrl, "MuskGreen_SignUpLogin_"+new Date().getMilliseconds());
}

function popitup(url,windowName) {
	newwindow=window.open(url,windowName,'height=500,width=400');
	if (window.focus) {
		newwindow.focus();
	}
	return false;
}


//For profile page
function disablePersonal(){
	document.getElementById("first_name").disabled = true;
	document.getElementById("last_name").disabled = true;
	document.getElementById("email").disabled = true;
	document.getElementById("submitPersonal").disabled = true;
	document.getElementById("resetPersonal").disabled = true;
}

function editPersonal() {
	if (document.getElementById("first_name").disabled === true) {
		document.getElementById("first_name").disabled = false;
		document.getElementById("last_name").disabled = false;
		document.getElementById("email").disabled = false;
		document.getElementById("submitPersonal").disabled = false;
		document.getElementById("resetPersonal").disabled = false;
	}	else {
		document.getElementById("first_name").disabled = true;
		document.getElementById("last_name").disabled = true;
		document.getElementById("email").disabled = true;
		document.getElementById("submitPersonal").disabled = true;
		document.getElementById("resetPersonal").disabled = true;
	}
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validatePersonalForm(){
    var pfn = $('#first_name').val();
    var pe = $('#email').val();
    if (!$.trim(pfn) && !$.trim(pe) && !validateEmail(pe)) {
        return false;
    } else {
    	return true; 
    }
}

function validateAddressForm(){
    var anv = $('#address_name').val();
    var alv = $('#address_locality').val();
    var aav = $('#address_area').val();
    var apv = $('#address_pincode').val();
    if (!$.trim(anv) && !$.trim(alv) && !$.trim(aav) && !$.trim(apv)) {
        return false;
    } else {
    	return true; 
    }
}

$(document).ready(function(){
	disablePersonal();
	$("#newAddressForm").hide();
	$("#newAddressFormButton").click(function(){
		$("#newAddressForm").toggle(250);
	});

	$("#personalForm").submit(function(){
		if (validatePersonalForm()) {
			$.post("formsProcess.php", $("#personalForm").serialize(), function(data) {
				alert(data);
		    });
		}
	});

	$("#newAddressForm").submit(function(){
		if (validateAddressForm()) {
			$.post("formsProcess.php", $("#newAddressForm").serialize(), function(data) {
		        // alert(data);
		    });
		}
	});
});