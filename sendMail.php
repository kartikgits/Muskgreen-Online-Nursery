<?php
require("assets/sendgridMail/sendgrid-php.php");
session_start();
//(works on epizy server)

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
	if ($_SESSION['orderConfirmed']===TRUE && isset($_POST['order_confirmation_mail']) && $_POST['order_confirmation_mail']=="true") {
		$_SESSION['orderConfirmed']=FALSE;
        $_POST['order_confirmation_mail']="false";
        
		$email = new \SendGrid\Mail\Mail();

		$SENDER_NAME = "MuskGreen Support";
		$SENDER_MAIL = "mgs@muskgreen.live";

		$email->setFrom($SENDER_MAIL, $SENDER_NAME);
		$email->setSubject("MuskGreen Order Confirmed");
		$email->addTo($_SESSION['userEmail'], "".$_SESSION['userFName']." ".$_SESSION['userLName']);
		
		$MAIL_CONTENT = 'Congratulations! Order Confirmed.';
		$email->addContent("text/html", $MAIL_CONTENT);
		$sendgrid = new \SendGrid("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");
		try {
		    $response = $sendgrid->send($email);
		    // print $response->statusCode() . "\n";
		    // print_r($response->headers());
		    // print $response->body() . "\n";
		} catch (Exception $e) {
		}
	}
}
?>