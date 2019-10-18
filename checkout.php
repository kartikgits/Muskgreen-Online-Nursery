<?php
    require 'config.php';
    session_start();
    if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE) {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart - MuskGreen | India's Latest Digital Nursery and Organic Products store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

    <!-- Our CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        body {
          background: -webkit-linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          min-height: 100vh;
        }
    </style>

    <style type="text/css">
		* {
		  box-sizing: border-box;
		}

		body {
		  background-color: #f1f1f1;
		}

		#regForm {
		  background-color: #ffffff;
		  margin: 100px auto;
		  padding: 40px;
		  width: 70%;
		  min-width: 300px;
		}

		h1 {
		  text-align: center;  
		}

		input {
		  padding: 10px;
		  width: 100%;
		  font-size: 17px;
		  border: 1px solid #aaaaaa;
		}

		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		}

		form.muskForm input { background-color: #fff; }

		.inputRequired:after { content:' *'; color: #e32;}

		/* Hide all steps by default: */
		.tab {
		  display: none;
		}

		button {
		  background-color: #4CAF50;
		  color: #ffffff;
		  border: none;
		  padding: 10px 20px;
		  font-size: 17px;
		  cursor: pointer;
		}

		button:hover {
		  opacity: 0.8;
		}

		#prevBtn {
		  background-color: #bbbbbb;
		}

		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none;  
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		.step.active {
		  opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #4CAF50;
		}
	</style>

    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div id="regForm">
	  <h1>MuskGreen Checkout</h1>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="text-align:center;margin-top:40px;">
	    <span class="step"></span>
	    <span class="step"></span>
	    <span class="step"></span>
	    <span class="step"></span>
	  </div>
	  <!-- One "tab" for each step in the form: -->
	  <div class="tab"><h5>Select An Address:</h5>
		  <div class="card-deck" id="toEditAddress">
		  <?php
		  	$sqlAddressCount="SELECT * FROM useraddress WHERE uid = '".$_SESSION['userId']."'";
	        $resultAddressCount=$conn->query($sqlAddressCount);
	        $addressCount=0;
	        while($row=$resultAddressCount->fetch_assoc()){
	        	$addressCount=$addressCount+1;
		        	//show select address and add address
		  ?>
                  <div class="card" style="min-width: 10rem;">
                    <div class="card-body">
                      <h5 class="card-title"><?=$row['addressName']?> <small class="text-center"><a href="#" onclick="editUserAddress('<?=$row['addressName']?>', '<?=$row['locality']?>', '<?php if(is_null($row['landmark'])){echo "";}else {echo $row['landmark'];}?>','<?=$row['area']?>', '<?=$row['city']?>', '<?=$row['state']?>', '<?=$row['pincode']?>', '<?=$row['phone']?>')" data-toggle="modal" data-target="#editAddressModal">Edit</a></small><input type="radio" value="value1" name="addressSelect" style="width: 10%;"></h5>
                      <p class="card-text"><small class="text-muted">
                        <?=$row['locality']?>,
                        <?php
                            if(is_null($row['landmark'])){
                                echo " ";
                            } else {
                                echo " Near ".$row['landmark'].",";
                            }
                        ?>
                        <?=$row['area']?>, 
                        <?=$row['city']?>, 
                        <?=$row['state']?> - <?=$row['pincode']?>
                        </small></p>
                      <p class="card-text"><small class="text-muted"><?=$row['phone']?></small></p>
                    </div>
                  </div>
		  <?php
		        }
		  ?>
		  		</div>
		  <?php
		  	if ($addressCount===0) {
		  		echo "You do not have any saved addresses. Please add an Address.";
		  	}
		    if ($addressCount<5) {
		  ?>
		  		<br/>
		  		<div class="text-center"><h4>OR</h4></div>
		  		<h5>Add An Address:
		  			<button type="button" class="btn btn-sm" title="Click To Add New Address" id="newAddressFormButton" data-toggle="modal" data-target="#addAddressModal" onclick="addUserAddress()"><i class="fa fa-map-marker"></i> Add Address</button>
		  		</h5>
		  <?php
		    }
		  ?>
	  </div>
	  <?php
	  ?>
	  <div class="tab">Contact Info:
	    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
	    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
	  </div>
	  <div class="tab">Birthday:
	    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
	    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
	    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
	  </div>
	  <div class="tab">Login Info:
	    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
	    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
	  </div>
	  <div style="overflow:auto;">
	    <div style="float:right;">
	      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
	      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
	    </div>
	  </div>
	</div>

	<!-- The AddAddress Modal -->
      <div class="modal fade" id="addAddressModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Address</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" id="addAddressBox">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>

	<!-- The EditAddress Modal -->
	  <div class="modal fade" id="editAddressModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Edit Address</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body" id="editUserAddressBox">
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        </div>
	        
	      </div>
	    </div>
	  </div>

	<script>
		var currentTab = 0; // Current tab is set to be the first tab (0)
		showTab(currentTab); // Display the current tab

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
		  if (n == (x.length - 1)) {
		    document.getElementById("nextBtn").innerHTML = "Submit";
		  } else {
		    document.getElementById("nextBtn").innerHTML = "Next";
		  }
		  //... and run a function that will display the correct step indicator:
		  fixStepIndicator(n)
		}

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
		  if (currentTab >= x.length) {
		    // ... the form gets submitted:
		    document.getElementById("regForm").submit();
		    return false;
		  }
		  // Otherwise, display the correct tab:
		  showTab(currentTab);
		}

		function validateForm() {
		  // This function deals with validation of the form fields
		  var x, y, i, valid = true;
		  x = document.getElementsByClassName("tab");
		  y = x[currentTab].getElementsByTagName("input");
		  // A loop that checks every input field in the current tab:
		  for (i = 0; i < y.length; i++) {
		    // If a field is empty...
		    if (y[i].value == "") {
		      // add an "invalid" class to the field:
		      y[i].className += " invalid";
		      // and set the current valid status to false
		      valid = false;
		    }
		  }
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
	</script>

	<script type="text/javascript" src="js/checkOut.js"></script>
</body>
</html>