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
		
		$MAIL_CONTENT = '<div style="padding: 0rem;">
						<div style="background-color: #509534; padding: 0.5rem; color: #fff; border-radius: 5px;"><center><h2>MuskGreen Order</h2></center></div>

						  <div style="padding-left: 1rem; padding-right: 1rem;">
						    <p style="color: #66BB6A !important;">
						      Thank you for your Green order. <small>We are processing your order and shall arrive soon.<br><br>
						      Here are the details:</small>
						    </p>
						    
						    <div style="max-width: 18rem; border: 1px solid #66BB6A; border-radius: 4px; padding: 1rem;">
						      <div>
						          <span style="max-width: 12rem;">
						            <b>Order ID:</b> MGO92918291
						          </span><br>
						          <span style="max-width: 12rem;">
						            <b>Payment Method:</b> Cash
						          </span><br>
						        <small>34, Kunj Vihar, P.O. Banjarawala, Dehradun - 248001 : 9808639036</small>
						      </div>
						    </div>
						    <br>
						    <table>
						      <thead style="color:#fff; background-color: #66BB6A;">
						        <tr>
						          <th>#</th>
						          <th>Product</th>
						          <th>Quant</th>
						          <th>Cost</th>
						        </tr>
						      </thead>
						      <tbody>
						        <tr>
						          <td style="padding-left: 4px; padding-right: 4px;">1</td>
						          <td style="padding-left: 4px; padding-right: 4px;">
						          <span style="max-width: 8rem;">
						            Praeterea iter est quasdam res quas ex communi.
						          </span>
						          </td>
						          <td style="padding-left: 4px; padding-right: 4px;">10</td>
						          <td style="padding-left: 4px; padding-right: 4px;">3500</td>
						        </tr>
						      </tbody>
						    </table>
						    <br>
						    <div style="max-width: 18rem; border: 1px solid #66BB6A; border-radius: 4px; padding: 1rem;">
						      <div>
						          <span style="max-width: 12rem;">
						            <b>Order Total:</b> Rs. 3499*
						          </span><br>
						          <span style="max-width: 12rem;">
						            <b>Delivery Time:</b> 2-4 days
						          </span><br>
						        <small>* Price inclusive of GST</small>
						      </div>
						    </div>
						    
						  </div>
						</div>';

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