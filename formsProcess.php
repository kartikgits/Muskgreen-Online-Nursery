<?php
	session_start();
	require 'config.php';

	if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
		if (isset($_POST['newAddressForm']) && $_POST['newAddressForm']=="true") {
			$safeAddressName = preg_replace('/[^\w,. ]/','',$_POST['address_name']);
			if (isset($_POST['address_contact']) && $_POST['address_contact']!="") {
				$safeContact = preg_replace('/[^\w]/','',$_POST['address_contact']);
			}else{
				$safeContact = $_SESSION['userPrimeNumber'];
			}
			$safeLocality = preg_replace('/[^\w,. ]/','',$_POST['address_locality']);
			$safeArea = preg_replace('/[^\w,. ]/','',$_POST['address_area']);
			if (isset($_POST['address_landmark']) && $_POST['address_landmark']!="") {
				$safeLandmark = preg_replace('/[^\w,. ]/','',$_POST['address_landmark']);
			}
			$safePincode = preg_replace('/[^\w]/','',$_POST['address_pincode']);

			if (isset($_POST['address_landmark']) && $_POST['address_landmark']!="") {
				$insertAddressQuery = "insert into useraddress (uid, addressName, locality, pincode, area, landmark, phone) values ('".$_SESSION['userId']."','".$safeAddressName."','".$safeLocality."','".$safePincode."','".$safeArea."','".$safeLandmark."','".$safeContact."')";
			}else{
				$insertAddressQuery = "insert into useraddress (uid, addressName, locality, pincode, area, phone) values ('".$_SESSION['userId']."','".$safeAddressName."','".$safeLocality."','".$safePincode."','".$safeArea."','".$safeContact."')";
			}

			if ($conn->query($insertAddressQuery) === TRUE) {
			} else {
			}
		}
		else if (isset($_POST['editAddressForm']) && $_POST['editAddressForm']=="true") {
			$safeAddressName = preg_replace('/[^\w ]/','',$_POST['edit_address_name']);
			if (isset($_POST['edit_address_contact']) && $_POST['edit_address_contact']!="") {
				$safeContact = preg_replace('/[^\w]/','',$_POST['edit_address_contact']);
			}else{
				$safeContact = $_SESSION['userPrimeNumber'];
			}
			$safeLocality = preg_replace('/[^\w, ]/','',$_POST['edit_address_locality']);
			$safeArea = preg_replace('/[^\w, ]/','',$_POST['edit_address_area']);
			if (isset($_POST['edit_address_landmark']) && $_POST['edit_address_landmark']!="") {
				$safeLandmark = preg_replace('/[^\w, ]/','',$_POST['edit_address_landmark']);
			}
			$safePincode = preg_replace('/[^\w]/','',$_POST['edit_address_pincode']);

			if (isset($_POST['edit_address_landmark']) && $_POST['edit_address_landmark']!="") {
				$updateAddressQuery = "update useraddress set locality='".$safeLocality."', pincode='".$safePincode."', area='".$safeArea."', landmark='".$safeLandmark."', phone='".$safeContact."' where uid='".$_SESSION['userId']."' and addressName='".$safeAddressName."'";
			}else{
				$updateAddressQuery = "update useraddress set locality='".$safeLocality."', pincode='".$safePincode."', area='".$safeArea."', phone='".$safeContact."' where uid='".$_SESSION['userId']."' and addressName='".$safeAddressName."'";
			}

			if ($conn->query($updateAddressQuery) === TRUE) {
			} else {
			}
		}
		else if (isset($_POST['delete_address']) && $_POST['delete_address']=="true") {
			$safeAddressName = preg_replace('/[^\w ]/','',$_POST['address_name']);
			$deleteAddressQuery = "delete from useraddress where uid='".$_SESSION['userId']."' and addressName='".$safeAddressName."'";
			if ($conn->query($deleteAddressQuery) === TRUE) {
			} else {
			}
		}
		else if (isset($_POST['personalForm']) && $_POST['personalForm']=="true") {
			$safeFName = preg_replace('/[^\w ]/','',$_POST['first_name']);
			if (isset($_POST['last_name']) && $_POST['last_name']!="") {
				$safeLName = preg_replace('/[^\w ]/','',$_POST['last_name']);
			}else{
				$safeLName = "";
			}

			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$updateUserQuery = "update user set fname='".$safeFName."', lname='".$safeLName."', email='".$_POST['email']."' where uid='".$_SESSION['userId']."'";

				if ($conn->query($updateUserQuery) === TRUE) {
					$_SESSION['userFName']=$safeFName;
					$_SESSION['userLName']=$safeLName;
					$_SESSION['userEmail']=$_POST['email'];
				} else {
				}
			}else{
				//invalid email format
			}
		}

		//ProductDetail page
		else if(isset($_POST['add_to_cart']) && $_POST['add_to_cart']=="true"){
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$addToCartQuery = "insert into usercart (proid, uid) values ('".$safeProductId."', '".$_SESSION['userId']."')";
			if ($conn->query($addToCartQuery) === TRUE) {
			} else {
			}
		}

		else if(isset($_POST['delete_from_cart']) && $_POST['delete_from_cart']=="true"){
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$deleteFromCartQuery = "delete from usercart where uid = '".$_SESSION['userId']."' and proid = '".$safeProductId."'";
			if ($conn->query($deleteFromCartQuery) === TRUE) {
			} else {
			}
		}

		//Cart page
		else if (isset($_POST['get_cart_subtotal']) && $_POST['get_cart_subtotal']=="true") {
			$getCartSubtotalQuery ="select usercart.proid, (sp-((discount/100)*cp))*quantity as subprice from usercart natural join product natural join productseller where usercart.uid='".$_SESSION['userId']."' group by proid";
			$result=$conn->query($getCartSubtotalQuery);
			$subTotal=0.0;
			while ($row=$result->fetch_assoc()) {
				$subTotal = $subTotal + floatval($row['subprice']);
			}
			$subTotal = number_format((float)$subTotal, 2, '.', '');
			echo $subTotal;
		}

		else if (isset($_POST['quantity_change']) && $_POST['quantity_change']=="true") {
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$safeQuantity = intval($_POST['selected_quantity']);
			$changeQuantityQuery="update usercart set quantity=".$safeQuantity." where uid = '".$_SESSION['userId']."' and proid = '".$safeProductId."'";
			if ($conn->query($changeQuantityQuery) === TRUE) {
			} else {
			}
		}

		else if (isset($_POST['delete_cart_product']) && $_POST['delete_cart_product']=="true") {
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$changeQuantityQuery="delete from usercart where uid = '".$_SESSION['userId']."' and proid = '".$safeProductId."'";
			if ($conn->query($changeQuantityQuery) === TRUE) {
			} else {
			}
			$updateFromCartQuery = "select count(proid) from usercart where uid = '".$_SESSION['userId']."'";
			$result=$conn->query($updateFromCartQuery);
			$row=$result->fetch_assoc();
			$_SESSION['cartCount']=$row['count(proid)'];
		}
	}
	$conn->close();
?>