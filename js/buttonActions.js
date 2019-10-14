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
	document.getElementById("email_verify").disabled = true;
	document.getElementById("submitPersonal").disabled = true;
	document.getElementById("resetPersonal").disabled = true;
}

function editPersonal() {
	if (document.getElementById("first_name").disabled === true) {
		document.getElementById("first_name").disabled = false;
		document.getElementById("last_name").disabled = false;
		document.getElementById("email").disabled = false;
		document.getElementById("email_verify").disabled = false;
		document.getElementById("submitPersonal").disabled = false;
		document.getElementById("resetPersonal").disabled = false;
	}	else {
		document.getElementById("first_name").disabled = true;
		document.getElementById("last_name").disabled = true;
		document.getElementById("email").disabled = true;
		document.getElementById("email_verify").disabled = true;
		document.getElementById("submitPersonal").disabled = true;
		document.getElementById("resetPersonal").disabled = true;
	}
}

$(document).ready(function(){
	disablePersonal();
	$("#newAddressForm").hide();
	$("#newAddressFormButton").click(function(){
		$("#newAddressForm").toggle(250);
	});
});

$("#submitNewAddress").click(function(){
	//send async request here
	$.post("formsProcess.php", $("#newAddressForm").serialize(), function(data) {
        // alert(data);
    });
});