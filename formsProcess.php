<?php
	session_start();
	require 'config.php';

	if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
		if (isset($_POST['newAddressForm']) && $_POST['newAddressForm']=="true") {
			$safeAddressName = preg_replace('/[^\w ]/','',$_POST['address_name']);
			if (isset($_POST['address_contact']) && $_POST['address_contact']!="") {
				$safeContact = preg_replace('/[^\w]/','',$_POST['address_contact']);
			}else{
				$safeContact = $_SESSION['userPrimeNumber'];
			}
			$safeLocality = preg_replace('/[^\w, ]/','',$_POST['address_locality']);
			$safeArea = preg_replace('/[^\w, ]/','',$_POST['address_area']);
			if (isset($_POST['address_landmark']) && $_POST['address_landmark']!="") {
				$safeLandmark = preg_replace('/[^\w, ]/','',$_POST['address_landmark']);
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
	}
	$conn->close();
?>