<?php
	session_start();

    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    require 'config.php';

    if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE) {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
    } else{
    	if ($_SESSION['cartCount']<1) {
    		header('Location: index.php');
    	}
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
		* {
		  box-sizing: border-box;
		}

		body {
		  background-color: #f1f1f1;
		}

		.regForm {
		  background-color: #ffffff;
		  margin: 100px auto;
		  padding: 40px;
		  width: 70%;
		  min-width: 300px;
		  -webkit-box-shadow: 1px 1px 7px 0px rgba(40,99,79,1);
		  -moz-box-shadow: 1px 1px 7px 0px rgba(40,99,79,1);
		  box-shadow: 1px 1px 7px 0px rgba(40,99,79,1);
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

		/*Address & Payment select styles*/
		.addressLabel {
			cursor: pointer;
			border: 0px;
			background: -webkit-linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          	background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
			border-radius: 16px !important;
		}

		.addressLabel:hover {
			-webkit-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			-moz-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
		}

		.addressLabelSelected {
			-webkit-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			-moz-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
		}

		.paymentLabel {
			cursor: pointer;
			background: -webkit-linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          	background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
			border-radius: 16px !important;
		}

		.paymentLabel:hover {
			-webkit-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			-moz-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
		}

		.paymentLabelSelected {
			-webkit-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			-moz-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
		}

		.reviewOrder {
			background: -webkit-linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          	background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          	-webkit-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			-moz-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			color: #fff !important;
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
	<div class="regForm">
	  <h1>MuskGreen Checkout</h1>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="text-align:center; margin-top:25px;">
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
                  <label class="card text-white bg-primary addressLabel" id="addressSelectId<?=$addressCount?>" style="min-width: 16rem; max-width: 16rem; margin-top: 1.7rem;">
                    <div class="card-body">
                      <h5 class="card-title"><?=$row['addressName']?> <small class="text-center"><a href="#" onclick="editUserAddress('<?=$row['addressName']?>', '<?=$row['locality']?>', '<?php if(is_null($row['landmark'])){echo "";}else {echo $row['landmark'];}?>','<?=$row['area']?>', '<?=$row['city']?>', '<?=$row['state']?>', '<?=$row['pincode']?>', '<?=$row['phone']?>')" data-toggle="modal" data-target="#editAddressModal" style="color: #fff;">Edit</a></small><input type="radio" value="<?=$row['addressName']?>_<?=$addressCount?>" name="addressSelect" style="width: 10px; visibility: hidden;"></h5>
                      <p class="card-text"><small class="text-white">
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
                      <p class="card-text"><small class="text-white"><?=$row['phone']?></small></p>
                    </div>
                  </label>
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
		    echo "<div id=\"addressCountDiv\" style=\"display:none;\">".$addressCount."</div>";
		  ?>
	  </div>
	  <?php
	  ?>
	  <div class="tab"><h5>Select Payment Method:</h5>
	    <label class="card text-white bg-primary mb-4 paymentLabel" id="paymentMethodOnlineId" style="min-width: 10rem; max-width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Pay Online<input type="radio" name="paymentSelect" value="onlinePay" style="width: 10px; visibility:hidden;"></h5>
		    <p class="card-text">with VISA, MasterCard, Rupay, Paytm and other methods</p>
		  </div>
		</label>
		<label class="card text-white bg-primary mb-4 paymentLabel" id="paymentMethodCodId" style="min-width: 10rem; max-width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Pay at Delivery<input type="radio" name="paymentSelect" id="paymentMethodId" value="codPay" style="width: 10px; visibility:hidden;"></h5>
		    <p class="card-text">with Paytm or Cash</p>
		  </div>
		</label>
	  </div>

	  <div class="tab"><h5>Review Order:</h5>
	  	<div class="card mb-3 reviewOrder" style="max-width: 540px;">
		  <div class="row no-gutters">
		    <div class="col-md-4">
		      <img src="https://via.placeholder.com/150x240" class="card-img" alt="" style="max-width: 180px; max-height: 287px;">
		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title" id="totalOrderCharges"></h5>
		        <p class="card-text">
		        	<div id="orderSubtotal"></div>
		        	<div id="orderDeliveryCharges"></div>
		        </p>
		        <p class="card-text"><small class="text-muted" style="color: #fff !important">Your payments are completely secured with MuskGreen. In case of an order failure, we'll fully refund your amount.</small></p>
		      </div>
		    </div>
		  </div>
		</div>
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

	  <!-- Redirection Form - op -->
	  <form method="post" name="payOnlineForm" action="onlinePayment.php">
	  	<input type="hidden" name="order_confirmation" value="true">
	  	<input type="hidden" name="payment_method" value="onlinePay">
	  	<input type="hidden" name="delivery_address" value="" id="user_delivery_address">
	  </form>

	<script type="text/javascript" src="js/checkOut.js"></script>
</body>
</html>