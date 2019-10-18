function addUserAddress(){
	var addAddressHtml = "<form class=\"form muskForm\" action=\"\" method=\"post\" id=\"addAddressForm\">\r\n\t<input type=\"hidden\" name=\"newAddressForm\" value=\"true\"\/>\r\n\t\t<div class=\"form-group\">\r\n        \t<div class=\"col-xs-6\">\r\n            \t<label for=\"address_name\"><h4>Address Name<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n            \t<input type=\"text\" class=\"form-control\" name=\"address_name\" id=\"address_name\" placeholder=\"Eg. Home, Office etc.\" title=\"Please Enter A Unique Address Name\" required>\r\n        \t<\/div>\r\n        <\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"address_contact\"><h4>Contact Number<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"address_contact\" id=\"address_contact\" placeholder=\"Enter Address Phone\/Mobile Number\" title=\"Enter Contact (Leave Blank To Use Your Number)\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_locality\"><h4>Locality<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_locality\" id=\"address_locality\" placeholder=\"Eg. Colony\/Village name\" title=\"Please Enter Your Locality\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_area\"><h4>Area<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_area\" id=\"address_area\" placeholder=\"Eg. Street name\" title=\"Please Enter Your Area\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"address_landmark\"><h4>Landmark<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"address_landmark\" id=\"address_landmark\" placeholder=\"Eg. Famous Monument\/School\/Park name etc.\" title=\"Please Enter Any Nearby Landmark\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_city\"><h4>City<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_city\" id=\"address_city\" placeholder=\"Dehradun\" title=\"Please Enter Your City Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_pincode\"><h4>PinCode<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_pincode\" id=\"address_pincode\" placeholder=\"PinCode\/ZipCode Number\" title=\"Please Enter Your PinCode Number\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_state\"><h4>State<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_state\" id=\"address_state\" placeholder=\"Uttarakhand\" title=\"Please Enter Your State Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-12\">\r\n\t\t\t\t<br>\r\n\t\t\t\t\t<button class=\"btn btn-lg btn-success\" type=\"submit\" id=\"submitAddAddress\" onclick=\"submitAddedAddress()\"><i class=\"fa fa-check-circle-o\"><\/i> Save<\/button>\r\n\t\t\t\t<button class=\"btn btn-lg btn-secondary\" type=\"reset\" id=\"resetEditAddress\"><i class=\"fa fa-repeat\"><\/i> Reset<\/button>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n<\/form>";
	document.getElementById("addAddressBox").innerHTML = addAddressHtml;
}

function validateUserAddressForm(){
	var pattern = /^[A-Za-z0-9]+$/;
    var anv = $('#address_name').val();
    var alv = $('#address_locality').val();
    var aav = $('#address_area').val();
    var apv = $('#address_pincode').val();
    if (pattern.test(anv) && pattern.test(alv) && pattern.test(aav) && pattern.test(apv)) {
        return true;
    } else {
    	return false; 
    }
}

function submitAddedAddress() {
	if (validateUserAddressForm()==true) {
		$.post("formsProcess.php", $("#addAddressForm").serialize(), function(data) {
	    });
	}
}