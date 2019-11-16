<?php
	if (isset($_COOKIE['muskRemAuth'])) {
		require './config.php';
		$cookieUID = $conn->real_escape_string($_COOKIE['muskRemAuth']);
		//log in the user (Use case sensitive check)
		$getUserQuery = "SELECT * FROM user WHERE BINARY uid='".$cookieUID."'";
		$result=$conn->query($getUserQuery);
		if (mysqli_num_rows($result)!=0) {
			$row=$result->fetch_assoc();
			session_unset();
			session_destroy();
			session_start();
			$_SESSION['isLoggedIn']=TRUE;
			$_SESSION['userId']=$cookieUID;
			$_SESSION['userFName']=$row['fname'];
			$_SESSION['userLName']=$row['lname'];
			$_SESSION['userPrimeNumber']=$row['primenumber'];
			$_SESSION['userEmail']=$row['email'];
			$_SESSION['orderConfirmed']=FALSE;

			$getUserCart="select count(proid) from usercart where uid='".$cookieUID."'";
			$result=$conn->query($getUserCart);
			$row=$result->fetch_assoc();
			$_SESSION['cartCount']=$row['count(proid)'];
			$_SESSION['transactionFlag']=FALSE;
		}
		$conn->close();
	}
?>