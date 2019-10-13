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