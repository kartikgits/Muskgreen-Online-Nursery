<?php
	session_start();
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("PaytmKit/lib/config_paytm.php");
	require_once("PaytmKit/lib/encdec_paytm.php");
	require 'config.php';

	$checkSum = "";
	$paramList = array();

	$ORDER_ID = "";
	$CUST_ID = "";
	$INDUSTRY_TYPE_ID = "Retail"; //For testing
	$CHANNEL_ID = "WEB"; //WEB for website
	$TXN_AMOUNT = 0.0;

	$chargeableAmount = 0.0;

	if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {

		if (isset($_POST['order_confirmation']) && $_POST['order_confirmation']=="true" && $_SESSION['cartCount']!=0) {
			if ($_POST['payment_method']=="onlinePay") {
				$sqlIdGen = "insert into orderidgenerator values()";
				if ($conn->query($sqlIdGen) === TRUE) {
					$sqlLastId = ("select last_insert_id() as lid");
					$resultLastId=$conn->query($sqlLastId);
					$id=0;
					while($idRow=$resultLastId->fetch_assoc()){
						$id = intval($idRow['lid']);
		        	}
		        	$uniqueId = 102624+$id;  //102624 is the base number to be appended with OIDs
		        	$oid = "MGO".(string)$uniqueId;

		        	$safeDeliveryAddress = preg_replace('/[^\w,. ]/','',$_POST['delivery_address']);
		        	$sqlOrder = "insert into productorder (uid, oid, paymentMethod, addressName) values ('".$_SESSION['userId']."', '".$oid."', 'Prepaid', '".$safeDeliveryAddress."')";
		        	if ($conn->query($sqlOrder)===TRUE) {
		        		$sqlOrderedProducts = "select usercart.proid, quantity, (sp-((discount/100)*cp))*quantity as subprice from usercart natural join productseller where uid='".$_SESSION['userId']."'";
		        		$resultOrderedProducts=$conn->query($sqlOrderedProducts);
		        		$sqlProductInsert="insert into productsinorder (proid, oid, quantity, totalPrice) values ";
		        		$i=0;
		        		while($rowOrderedProducts=$resultOrderedProducts->fetch_assoc()){
		        			if ($i==0) {
		        				$sqlProductInsert.="('".$rowOrderedProducts['proid']."', '".$oid."', ".$rowOrderedProducts['quantity']. ", ".$rowOrderedProducts['subprice'].")";
		        			}else{
		        				$sqlProductInsert.=", ('".$rowOrderedProducts['proid']."', '".$oid."', ".$rowOrderedProducts['quantity']. ", ".$rowOrderedProducts['subprice'].")";
		        			}
		        			$i=$i+1;
		        			$chargeableAmount = $chargeableAmount + floatval($rowOrderedProducts['subprice']);
			        	}
			        	if ($conn->query($sqlProductInsert) === TRUE) {
			        		//insertion successful
			        		//Order successful
			        		$sqlAddress="SELECT * FROM useraddress WHERE uid = '".$_SESSION['userId']."' and addressName='".$safeDeliveryAddress."'";
					        $resultAddress=$conn->query($sqlAddress);
					        $sqlInsertDeliveryAddress="";
					        while($row=$resultAddress->fetch_assoc()){
					        	$sqlInsertDeliveryAddress = "insert into deliveryaddress (oid, locality, pincode, area, city, state, landmark, phone) values ('".$oid."', '".$row['locality']."', '".$row['pincode']."', '".$row['area']."', '".$row['city']."', '".$row['state']."', '".$row['landmark']."', '".$row['phone']."')";
					        }

					        if ($conn->query($sqlInsertDeliveryAddress) === TRUE) {
					        	$_SESSION['orderConfirmed']=TRUE;
								$_SESSION['onlinePay']=TRUE;
					        	$ORDER_ID = $oid;
					        	$CUST_ID = $_SESSION['userId'];
					        	if ($chargeableAmount <= 599) {
					        		$chargeableAmount =$chargeableAmount + 40.0;
					        	}
					        	$TXN_AMOUNT = number_format((float)$chargeableAmount, 2, '.', '');
					        	$_SESSION['transactionFlag']=TRUE;
					        	echo $oid;
			        		}else{
			        			//error fetching delivery address
			        		}

			        		$deleteProductsFromCart="delete from usercart where uid='".$_SESSION['userId']."'";
			        		if ($conn->query($deleteProductsFromCart) === TRUE) {
			        			//deletion from cart successful
			        			$_SESSION['cartCount']=0;
			        		}else{
			        			//error deleting products from cart
			        		}
			        	}else{
			        		//error inserting products
			        		$error="Location: error.php?errorMessage="."There was an error processing your order. Please try again.";
							header($error);
			        	}

		        	}else{
		        		//error inserting order
		        		$error="Location: error.php?errorMessage="."There was an error processing your order. Please try again.";
		        		header($error);
		        	}
				} else {
					$error="Location: error.php?errorMessage="."There was an error processing your order. Please try again.";
					header($error);
				}

				//Proceed for payment
				if ($ORDER_ID!="" && $CUST_ID===$_SESSION['userId'] && $_SESSION['transactionFlag']===TRUE) {
					$paramList["MID"] = PAYTM_MERCHANT_MID;
					$paramList["ORDER_ID"] = $ORDER_ID;
					$paramList["CUST_ID"] = $CUST_ID;
					$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
					$paramList["CHANNEL_ID"] = $CHANNEL_ID;
					$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
					$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
					$paramList["CALLBACK_URL"] = "https://muskgreen.live/onlinePaymentCheck.php";
					$paramList["MSISDN"] = $_SESSION['userPrimeNumber']; //Mobile number of customer
					$paramList["EMAIL"] = $_SESSION['userEmail']; //Email ID of customer
					// $paramList["VERIFIED_BY"] = "EMAIL"; //
					// $paramList["IS_USER_VERIFIED"] = "YES"; //

					$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
				}

			}
		} else{
			//Error in page calling or cart items
			$error="Location: error.php?errorMessage="."Something is wrong! Please try again.";
			header($error);
		}
	} else{
		header('Location: index.php');
	}
	$conn->close();
?>


<html>
<head>
	<title>MuskGreen | Payment Gateway Redirect</title>
	<meta name="robots" content="noindex">
</head>
<body onload="document.ptform.submit()">
	<center><h5>Redirecting you to secured payment gateway...</h5></center>
	<center><h6>Please do not refresh this page!</h6></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL; ?>" name="ptform">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
	</form>
</body>
</html>