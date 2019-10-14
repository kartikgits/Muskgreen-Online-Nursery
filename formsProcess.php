<?php
	require 'config.php';
	session_start();

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
				$insertAddressQuery = "insert into useraddress (uid, addressName, locality, pincode, area, landmark, phone) values ('".$_SESSION['userId']."','".$safeAddressName."','".$safeLocality."','".$safePincode."','".$safeArea."','".$landmark."','".$safeContact."')";
			}else{
				$insertAddressQuery = "insert into useraddress (uid, addressName, locality, pincode, area, phone) values ('".$_SESSION['userId']."','".$safeAddressName."','".$safeLocality."','".$safePincode."','".$safeArea."','".$safeContact."')";
			}

			if ($conn->query($insertAddressQuery) === TRUE) {
			} else {
			}
		}
	}
	$conn->close();
?>