<?php
require("assets/sendgridMail/sendgrid-php.php");
require 'config.php';
session_start();
//(works on epizy server)

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
	if ($_SESSION['orderConfirmed']===TRUE && isset($_POST['order_confirmation_mail']) && $_POST['order_confirmation_mail']=="true") {
		//$_SESSION['orderConfirmed']=FALSE;
        $_POST['order_confirmation_mail']="false";

        $safeOid = preg_replace('/[^\w]/','',$_POST['order_id']);

		$email = new \SendGrid\Mail\Mail();

		$SENDER_NAME = "MuskGreen Support";
		$SENDER_MAIL = "mgs@muskgreen.live";

		$email->setFrom($SENDER_MAIL, $SENDER_NAME);
		$email->setSubject("Order Confirmed");
		$email->addTo($_SESSION['userEmail'], "".$_SESSION['userFName']." ".$_SESSION['userLName']);

		$sql="SELECT paymentMethod, productorder.addressName, locality, area, landmark, city, pincode, state, phone FROM deliveryaddress NATURAL JOIN productorder WHERE oid = '".$safeOid."'";

        $result=$conn->query($sql);
        
        $address='';
        $paymentMethod='';

        while ($row=$result->fetch_assoc()) {
        	$address=$address.$row["addressName"].': '.$row["locality"].', '.$row["area"];
        	if ($row['landmark']!='') {
        		$address=$address.', Near '.$row["landmark"];
        	}
        	$address=$address.', '.$row["city"].', '.$row["state"].' - '.$row["pincode"].', Contact: '.$row["phone"];

        	$paymentMethod=$row['paymentMethod'];
        }

        $productsRows='';
        $allProductsPrice=0;
        $prdArray = json_decode($_COOKIE['productsBuyList'], true);
        setcookie('productsBuyList', json_encode($prdArray), time()-60*60*365);
        while ($row=array_pop($prdArray)) {
        	$productsRows=$productsRows.'<tr>
									         <td style="padding-left: 4px; padding-right: 4px;">'.$row[0].'</td>
									         <td style="padding-left: 4px; padding-right: 4px;">
									         <span style="max-width: 8rem;">
									           '.$row[1].'
									         </span>
									         </td>
									         <td style="padding-left: 4px; padding-right: 4px;">'.$row[2].'</td>
									         <td style="padding-left: 4px; padding-right: 4px;">'.$row[3].'</td>
									       </tr>';
			$allProductsPrice=$allProductsPrice+floatval($row[3]);
        }

        if ($allProductsPrice<=599) {
        	$allProductsPrice=$allProductsPrice+40;
        }


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
						            <b>Order ID:</b> '.$safeOid.'
						          </span><br>
						          <span style="max-width: 12rem;">
						            <b>Payment Method:</b> '.$paymentMethod.'
						          </span><br>
						        <small>'.$address.'</small>
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
						      	'.$productsRows.'
						      </tbody>
						    </table>
						    <br>
						    <div style="max-width: 18rem; border: 1px solid #66BB6A; border-radius: 4px; padding: 1rem;">
						      <div>
						          <span style="max-width: 12rem;">
						            <b>Order Total:</b> Rs. '.$allProductsPrice.'*
						          </span><br>
						          <span style="max-width: 12rem;">
						            <b>Delivery Time:</b> 2-4 days
						          </span><br>
						        <small>* Price inclusive of GST</small>
						      </div>
						    </div>
						    <br>
						    <p style="color: #66BB6A !important;">We would love to see you back.</p>
							<div style="background-color: #66BB6A; color: #fff; font-size: 1.1rem; padding: 2rem; font-weight: 600; border-radius: 8px;">
								<center>
							    Next Morning Delivery of Fruits and Vegetables in Dehradun...<br>
							    Service starts soon.
							    </center>
							</div>
							<br><br>
							<center>MuskGreen<br>34, Kunj Vihar, Dehradun, Uttarakhand</center>
						  </div>
						</div>';

		$email->addContent("text/html", $MAIL_CONTENT);
		$sendgrid = new \SendGrid("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");
		try {
			echo "sent";
		    $response = $sendgrid->send($email);
		    // print $response->statusCode() . "\n";
		    // print_r($response->headers());
		    // print $response->body() . "\n";
		} catch (Exception $e) {
		}
		$conn->close();
	}
}
?>