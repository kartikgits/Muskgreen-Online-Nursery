<?php
	session_start();
	require 'config.php';

	if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
		if (isset($_POST['update_cart']) && $_POST['update_cart']=="true"){
			$updateFromCartQuery = "select count(proid) from usercart where uid = '".$_SESSION['userId']."'";
			$result=$conn->query($updateFromCartQuery);
			$row=$result->fetch_assoc();
			$_SESSION['cartCount']=$row['count(proid)'];
			echo $_SESSION['cartCount'];
		}
	}
	$conn->close();
?>