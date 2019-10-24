$("#buttonShow").click(function() {
    $('html,body').animate({
        scrollTop: $("#nextBtn").offset().top - 140},
        'slow');
});


function addUserAddress(){
	var addAddressHtml = "<form class=\"form muskForm\" action=\"\" method=\"post\" id=\"addAddressForm\">\r\n\t<input type=\"hidden\" name=\"newAddressForm\" value=\"true\"\/>\r\n\t\t<div class=\"form-group\">\r\n        \t<div class=\"col-xs-6\">\r\n            \t<label for=\"address_name\"><h4>Address Name<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n            \t<input type=\"text\" class=\"form-control\" name=\"address_name\" id=\"address_name\" placeholder=\"Eg. Home, Office etc.\" title=\"Please Enter A Unique Address Name\" required>\r\n        \t<\/div>\r\n        <\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"address_contact\"><h4>Contact Number<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"address_contact\" id=\"address_contact\" placeholder=\"Enter Address Phone\/Mobile Number\" title=\"Enter Contact (Leave Blank To Use Your Number)\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_locality\"><h4>Locality<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_locality\" id=\"address_locality\" placeholder=\"Eg. Colony\/Village name\" title=\"Please Enter Your Locality\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_area\"><h4>Area<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_area\" id=\"address_area\" placeholder=\"Eg. Street name\" title=\"Please Enter Your Area\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"address_landmark\"><h4>Landmark<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"address_landmark\" id=\"address_landmark\" placeholder=\"Eg. Famous Monument\/School\/Park name etc.\" title=\"Please Enter Any Nearby Landmark\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_city\"><h4>City<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_city\" id=\"address_city\" placeholder=\"Dehradun\" title=\"Please Enter Your City Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_pincode\"><h4>PinCode<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_pincode\" id=\"address_pincode\" placeholder=\"PinCode\/ZipCode Number\" title=\"Please Enter Your PinCode Number\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"address_state\"><h4>State<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"address_state\" id=\"address_state\" placeholder=\"Uttarakhand\" title=\"Please Enter Your State Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-12\">\r\n\t\t\t\t<br>\r\n\t\t\t\t\t<button class=\"btn btn-lg btn-success\" type=\"button\" id=\"submitAddAddress\" onclick=\"submitUserAddedAddress()\"><i class=\"fa fa-check-circle-o\"><\/i> Save<\/button>\r\n\t\t\t\t<button class=\"btn btn-lg btn-secondary\" type=\"reset\" id=\"resetAddress\"><i class=\"fa fa-repeat\"><\/i> Reset<\/button>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n<\/form>";
	document.getElementById("addAddressBox").innerHTML = addAddressHtml;
}

function validateUserAddressForm(){
	var pattern = /^[A-Za-z0-9 ,.]+$/;
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

function submitUserAddedAddress() {
	if (validateUserAddressForm()==true) {
		$.post("formsProcess.php", $("#addAddressForm").serialize()).done(function () {
	    	window.location.reload();
	    });
	}
}



function validateUserEditAddressForm(){
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

function editUserAddress(addressName, locality, landmark, area, city, state, pincode, phone){
	var editAddressHtml = "<form class=\"form muskForm\" action=\"\" method=\"post\" id=\"editAddressForm\">\r\n\t<input type=\"hidden\" name=\"editAddressForm\" value=\"true\"\/>\r\n\t\t<div class=\"form-group\">\r\n        \t<div class=\"col-xs-6\">\r\n            \t<label for=\"edit_address_name\"><h4>Address Name<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n            \t<input type=\"text\" class=\"form-control\" name=\"edit_address_name\" id=\"edit_address_name\" placeholder=\"Eg. Home, Office etc.\" title=\"Please Enter A Unique Address Name\" required>\r\n        \t<\/div>\r\n        <\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"edit_address_contact\"><h4>Contact Number<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"edit_address_contact\" id=\"edit_address_contact\" placeholder=\"Enter Address Phone\/Mobile Number\" title=\"Enter Contact (Leave Blank To Use Your Number)\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_locality\"><h4>Locality<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_locality\" id=\"edit_address_locality\" placeholder=\"Eg. Colony\/Village name\" title=\"Please Enter Your Locality\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_area\"><h4>Area<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_area\" id=\"edit_address_area\" placeholder=\"Eg. Street name\" title=\"Please Enter Your Area\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t  <div class=\"col-xs-6\">\r\n\t\t      <label for=\"edit_address_landmark\"><h4>Landmark<\/h4><\/label>\r\n\t\t      <input type=\"text\" class=\"form-control\" name=\"edit_address_landmark\" id=\"edit_address_landmark\" placeholder=\"Eg. Famous Monument\/School\/Park name etc.\" title=\"Please Enter Any Nearby Landmark\">\r\n\t\t  <\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_city\"><h4>City<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_city\" id=\"edit_address_city\" placeholder=\"Dehradun\" title=\"Please Enter Your City Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_pincode\"><h4>PinCode<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_pincode\" id=\"edit_address_pincode\" placeholder=\"PinCode\/ZipCode Number\" title=\"Please Enter Your PinCode Number\" required>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-6\">\r\n\t\t\t\t<label for=\"edit_address_state\"><h4>State<\/h4><\/label><span class=\"inputRequired\"><\/span>\r\n\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"edit_address_state\" id=\"edit_address_state\" placeholder=\"Uttarakhand\" title=\"Please Enter Your State Name\" disabled>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n\t\t<div class=\"form-group\">\r\n\t\t\t<div class=\"col-xs-12\">\r\n\t\t\t\t<br>\r\n\t\t\t\t\t<button class=\"btn btn-lg btn-success\" type=\"button\" id=\"submitEditAddress\" onclick=\"submitUserEditedAddress()\"><i class=\"fa fa-check-circle-o\"><\/i> Save<\/button>\r\n\t\t\t\t<button class=\"btn btn-lg btn-secondary\" type=\"reset\" id=\"resetEditAddress\"><i class=\"fa fa-repeat\"><\/i> Reset<\/button>\r\n\t\t\t<\/div>\r\n\t\t<\/div>\r\n<\/form>";
	document.getElementById("editUserAddressBox").innerHTML = editAddressHtml;
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

function submitUserEditedAddress(){
	document.getElementById("edit_address_name").disabled = false;
	if (validateUserEditAddressForm()) {
		$.post("formsProcess.php", $("#editAddressForm").serialize(), function(data) {
	    });
	    window.location.reload();
	}
}






//function for email validation
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

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
  } else {
    document.getElementById("first_name").disabled = true;
    document.getElementById("last_name").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("submitPersonal").disabled = true;
    document.getElementById("resetPersonal").disabled = true;
  }
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

$("#submitPersonal").click(function(){
  if (validatePersonalForm()) {
    $.post("formsProcess.php", $("#personalForm").serialize()).done(function(){
      disablePersonal();
    });
  }
});


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

var deliveryAddress=""; //for keeping track of delivery address selected by user
var paymentMethod=""; //for keeping track of payment method selected by user

//set up delivery address variable
function setDeliveryAddress(addressOfDelivery) {
	deliveryAddress = addressOfDelivery.split('_')[0];
	for (var i = 1; i <= 5; i++) {
		if (i==addressOfDelivery.split('_')[1]) {
			$("#addressSelectId"+i).addClass("addressLabelSelected");
		}else{
			$("#addressSelectId"+i).removeClass("addressLabelSelected");
		}
	}
}


//for delivery address click handle
$(".addressLabel").click(function(){
	if ($('input[name=addressSelect]:checked').length > 0) {
  		setDeliveryAddress($('input[name=addressSelect]:checked').val());
  	}else{
  	}
});

function setPaymentMethod(methodOfPayment) {
	paymentMethod=methodOfPayment;
}

//for payment method click handle
$(".paymentLabel").click(function(){
	if ($('input[name=paymentSelect]:checked').length > 0) {
  		document.getElementById("nextBtn").disabled = false;
  		setPaymentMethod($('input[name=paymentSelect]:checked').val());
  		if ($('input[name=paymentSelect]:checked').val()=="onlinePay") {
  			$("#paymentMethodOnlineId").addClass("paymentLabelSelected");
  			$("#paymentMethodCodId").removeClass("paymentLabelSelected");
  		}
  		else if ($('input[name=paymentSelect]:checked').val()=="codPay") {
  			$("#paymentMethodOnlineId").removeClass("paymentLabelSelected");
  			$("#paymentMethodCodId").addClass("paymentLabelSelected");
  		}
  		document.getElementById("nextBtn").innerHTML = "Review Order";
  	}else{
  	}
});

//Proceed for order/payment
// if (deliveryAddress!="") {
// 	if (paymentMethod=="onlinePay") {
		
// 	}else if (paymentMethod=="codPay") {
		
// 	}
// }

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  document.getElementById("nextBtn").disabled = false;
  if (n == (x.length - 2)) {
    document.getElementById("nextBtn").innerHTML = "Select Payment Method";
    document.getElementById("nextBtn").disabled = true;
  } else if (n == (x.length - 1)) {
	  	if (paymentMethod=="onlinePay") {
	  		document.getElementById("nextBtn").innerHTML = "Proceed for Payment";
	  		document.getElementById("nextBtn").onclick = function () { //make payment
	  			//set address and goto payment page
          document.getElementById("user_delivery_address").value = deliveryAddress;
          document.payOnlineForm.submit();
	  		}
	  	}else if (paymentMethod=="codPay") {
	  		document.getElementById("nextBtn").innerHTML = "Place Order";
	  		document.getElementById("nextBtn").onclick = function () { //place order
	  			//goto confirm and place order page
          var userOrderId="";
	  			$.post( "orderProcess.php", { order_confirmation: "true", payment_method: "codPay", delivery_address:deliveryAddress}, function(result){
            userOrderId=result;
          }).done(function(){
	  				//redirect user to order confirmed page with id orderid as get
            window.location.replace("orderConfirmed.php?oid="+userOrderId);
	  			});

	  		}
	  	}
  } else {
  		document.getElementById("nextBtn").innerHTML = "Next";
  }

  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

var lastTab=0;

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  // if (currentTab >= x.length) {
  //   // ... the form gets submitted:
  //   //Call Proceed for payment page here
  //   // document.getElementById("regForm").submit();
  //   return false;
  // }

  if (lastTab>=currentTab) {
    document.getElementById("nextBtn").onclick= function(){
      nextPrev(1);
    }
  }

  lastTab=currentTab;
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var valid = true;
  // var x, y, i, valid = true;
  // x = document.getElementsByClassName("tab");
  // y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:

  if (currentTab === 0) {
    if (document.getElementById("first_name").value=="User" || document.getElementById("first_name").value=="user" || document.getElementById("first_name").value=="") {
      valid=false;
    }

    if (document.getElementById("email").value=="" || !isEmail(document.getElementById("email").value)) {
      valid=false;
    }
  } else{
    if ($('input[name=addressSelect]:checked').length > 0) {
      setDeliveryAddress($('input[name=addressSelect]:checked').val());
    }else{
      valid=false;
    }
  }
  // for (i = 1; i < y.length; i++) {
  //   // If a field is empty...
  //   if (y[i].value == "") {
  //     // add an "invalid" class to the field:
  //     y[i].className += " invalid";
  //     // and set the current valid status to false
  //     valid = false;
  //   }
  // }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


//For order review
function getCartVariables(){
   $.post( "formsProcess.php", { get_cart_subtotal: "true" }, function(result){
      var subTotal=+parseFloat(result).toFixed(2);
      var total=0.0;
      if (subTotal < 1) {
         $("#orderSubtotal").html("Subtotal: &#8377;"+subTotal);
         $("#orderDeliveryCharges").html("Delivery Charges: &#8377;"+0.00);
         total=subTotal+0.0;
      }
      else if (subTotal<=599) {
         $("#orderSubtotal").html("Subtotal: &#8377;"+subTotal);
         $("#orderDeliveryCharges").html("Delivery Charges: &#8377;"+40.00);
         total=subTotal+40.0;
      }else{
         $("#orderSubtotal").html("Subtotal: &#8377;"+subTotal);
         $("#orderDeliveryCharges").html("Delivery Charges: <span>FREE</span>");
         total=subTotal;
      }
      $('#totalOrderCharges').html("Total Amount : &#8377;"+total);
   });
}

$(document).ready(function(){
  getCartVariables();
  disablePersonal();
});