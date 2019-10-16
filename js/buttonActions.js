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


//For ProductDetail page
$(document).ready(function(){
	$(".product_check").click(function(){
		$("#loader").show();

		var action = 'data';
		var category = get_filter_text('category');

		$.ajax({
			url:'action.php',
			method: 'POST',
			data:{action:action, category:category},
			success:function(response){
				$("#result").html(response);
				$("#loader").hide();
				$("#textChange").text("Filtered Products");
			}
		});
	});

	function get_filter_text(text_id){
		var filterData = [];
		$('#'+text_id+':checked').each(function(){
			filterData.push($(this).val());
		});
		return filterData;
	}
});

function updateUserCart() {
	$.post( "updateSession.php", { update_cart: "true" }, function(result){
		$("#cartCountUserDesktop").html(result);
		$("#cartCountUserMobile").html(" "+result);
	});
}

function addToCart(productId){
	var cartButton = document.getElementById("addToCartButton");
	if (cartButton.innerHTML=="<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i> Add To Cart"){
		$.post( "formsProcess.php", { add_to_cart: "true", product_id: productId } );
		cartButton.innerHTML="<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i> Added to Cart";
	} else {
		$.post( "formsProcess.php", { delete_from_cart: "true", product_id: productId } );
		cartButton.innerHTML="<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i> Add To Cart";
	}
	updateUserCart();
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

function validateEditAddressForm(){
    var env = $('#edit_address_name').val();
    var elv = $('#edit_address_locality').val();
    var eav = $('#edit_address_area').val();
    var epv = $('#edit_address_pincode').val();
    if (!$.trim(env) && !$.trim(elv) && !$.trim(eav) && !$.trim(epv)) {
        return false;
    } else {
    	return true; 
    }
}

function editAddress(addressName, locality, landmark, area, city, state, pincode, phone){
	var editAddressHtml = "<form class=\"form muskForm\" action=\"\" method=\"post\" id=\"editAddressForm\">\r\n\t<input type=\"hidden\" name=\"editAddressForm\" value=\"true\"\/>\r\n\t\t<div class=\"form-group\">\r\n        \t<div class=\"col-xs-6\">\r\n            \t<label for=\"edit_address_name\"><h4>Address Name<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n            \t<input type=\"text\" class=\"form-control\" name=\"edit_address_name\" id=\"edit_address_name\" placeholder=\"Eg. Home, Office etc.\" title=\"Please Enter A Unique Address Name\" required>\r\n        \t<\/div>\r\n        <\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"edit_address_contact\"><h4>Contact Number<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"edit_address_contact\" id=\"edit_address_contact\" placeholder=\"Enter Address Phone\/Mobile Number\" title=\"Enter Contact (Leave Blank To Use Your Number)\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_locality\"><h4>Locality<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_locality\" id=\"edit_address_locality\" placeholder=\"Eg. Colony\/Village name\" title=\"Please Enter Your Locality\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_area\"><h4>Area<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_area\" id=\"edit_address_area\" placeholder=\"Eg. Street name\" title=\"Please Enter Your Area\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"edit_address_landmark\"><h4>Landmark<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"edit_address_landmark\" id=\"edit_address_landmark\" placeholder=\"Eg. Famous Monument\/School\/Park name etc.\" title=\"Please Enter Any Nearby Landmark\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_city\"><h4>City<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_city\" id=\"edit_address_city\" placeholder=\"Dehradun\" title=\"Please Enter Your City Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_pincode\"><h4>PinCode<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_pincode\" id=\"edit_address_pincode\" placeholder=\"PinCode\/ZipCode Number\" title=\"Please Enter Your PinCode Number\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_state\"><h4>State<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_state\" id=\"edit_address_state\" placeholder=\"Uttarakhand\" title=\"Please Enter Your State Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-12\">\r\n\t\t\t\t<br>\r\n\t\t\t\t\t<button class=\"btn btn-lg btn-success\" type=\"submit\" id=\"submitEditAddress\" onclick=\"submitEditedAddress()\"><i class=\"fa fa-check-circle-o\"><\/i> Save<\/button>\r\n\t\t\t\t<button class=\"btn btn-lg btn-secondary\" type=\"reset\" id=\"resetEditAddress\"><i class=\"fa fa-repeat\"><\/i> Reset<\/button>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n<\/form>";
	document.getElementById("editAddressBox").innerHTML = editAddressHtml;
	document.getElementById("edit_address_name").value = addressName;
	document.getElementById("edit_address_name").disabled = true;
	document.getElementById("edit_address_contact").value = phone;
	document.getElementById("edit_address_locality").value = locality;
	document.getElementById("edit_address_area").value = area;
	document.getElementById("edit_address_landmark").value = landmark;
	document.getElementById("edit_address_city").value = city;
	document.getElementById("edit_address_pincode").value = pincode;
	document.getElementById("edit_address_state").value = state;
}

function submitEditedAddress(){
	document.getElementById("edit_address_name").disabled = false;
	if (validateEditAddressForm()) {
		$.post("formsProcess.php", $("#editAddressForm").serialize(), function(data) {
	    });
	}
}

function deleteAddress(addressName){
	document.getElementById('deleteAddressModalBody').innerHTML = "Are you sure that you want to delete "+addressName+" address?";
	document.getElementById('deleteAddressConfirm').setAttribute('onclick','deleteAddressConfirmed(\"'+addressName+'\")');
}

function deleteAddressConfirmed(addressName){
	$.post( "formsProcess.php", { delete_address: "true", address_name: addressName } );
	window.location.reload();
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
				//alert(data);
		    });
		}
	});

	$("#newAddressForm").submit(function(){
		if (validateAddressForm()) {
			$.post("formsProcess.php", $("#newAddressForm").serialize(), function(data) {
		    });
		}
	});
});