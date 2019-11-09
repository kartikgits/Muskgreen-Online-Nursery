<?php
// following files need to be included
require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");
require 'config.php';
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE && !isset($_SESSION['transactionFlag']) && !$_SESSION['transactionFlag']===TRUE){
	header('Location: error.php');
}

$_SESSION['transactionFlag']=FALSE;

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		$sql="insert into onlinepayment (txnid, oid, txnamount, txnstatus, txndate, gatewayName, paymentmode, banktxnid) values ('".$paramList["TXNID"]."', '".$paramList["ORDERID"]."', '".floatval($paramList["TXNAMOUNT"])."', '".$paramList["STATUS"]."', '".$paramList["TXNDATE"]."', '".$paramList["GATEWAYNAME"]."', '".$paramList["PAYMENTMODE"]."', '".$paramList["BANKTXNID"]."')";

		if ($conn->query($sql) === TRUE) {
			//redirect to orderconfirmed page
			$conn->close();
			$_SESSION['onlinePayStatus']=TRUE;
			$locationHeader = 'Location: orderConfirmed.php?oid='.$paramList["ORDERID"].'&txnid='.$paramList["TXNID"];
			header($locationHeader);
		} else {
			$conn->close();
			$error="Location: error.php?errorMessage="."Your transaction was successful but it was a technical error. We will send you a confirmation mail in a while.";
			header($error);
		}
	}
	else {
		// echo "<b>Transaction status is failure</b>" . "<br/>";
		//Payment failed... Move to error page
		$conn->close();
		$error="Location: error.php?errorMessage="."Your payment was not successful. Please try again.";
		header($error);
	}

}
else {
	//Process transaction as suspicious.
	$conn->close();
	$error="Location: error.php?errorMessage="."Something went wrong. That's all we know.";
	header($error);
}

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>MuskGreen | Payment</title>
	<meta name="robots" content="noindex">
</head>
<body>
</body>
</html>