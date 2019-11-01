<?php
	require 'config.php';
	session_start();

	if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
		if (isset($_POST['order_confirmation']) && $_POST['order_confirmation']=="true" && $_SESSION['cartCount']!=0) {
			if ($_POST['payment_method']=="codPay") {
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
		        	$sqlOrder = "insert into productorder (uid, oid, paymentMethod, addressName) values ('".$_SESSION['userId']."', '".$oid."', 'Cash On Delivery', '".$safeDeliveryAddress."')";
		        	if ($conn->query($sqlOrder)===TRUE) {
		        		$sqlOrderedProducts = "select usercart.proid, quantity, (sp-((discount/100)*cp))*quantity as subprice from usercart natural join product natural join productseller where usercart.uid='".$_SESSION['userId']."' group by proid";
		        		$resultOrderedProducts=$conn->query($sqlOrderedProducts);
		        		$sqlProductInsert="insert into productsInOrder (proid, oid, quantity, totalPrice) values ";
		        		$i=0;
		        		while($rowOrderedProducts=$resultOrderedProducts->fetch_assoc()){
		        			if ($i==0) {
		        				$sqlProductInsert.="('".$rowOrderedProducts['proid']."', '".$oid."', ".$rowOrderedProducts['quantity']. ", ".$rowOrderedProducts['subprice'].")";
		        			}else{
		        				$sqlProductInsert.=", ('".$rowOrderedProducts['proid']."', '".$oid."', ".$rowOrderedProducts['quantity']. ", ".$rowOrderedProducts['subprice'].")";
		        			}
		        			$i=$i+1;
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
			        	}

		        	}else{
		        		//error inserting order
		        	}
				} else {
					//error generating orderid
				}
			}
		} else{
			//Error in page calling or cart items
		}
	}

	$conn->close();
?>