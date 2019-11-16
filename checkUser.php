<?php
	require 'config.php';
	//make this authentication more strong using firebase auth
	ob_start();
	if (isset($_POST['userId']) && isset($_POST['userPno'])) {
		$safeUserId = $conn->real_escape_string($_POST['userId']);
		$safePhone = $conn->real_escape_string($_POST['userPno']);
		$insertUserQuery = "INSERT INTO user (uid, primenumber) VALUES ('".$safeUserId."','".$safePhone."')";
		if ($conn->query($insertUserQuery) === TRUE) {
		} else {
		}

		//log in the user (Use case sensitive check)
		$getUserQuery = "SELECT * FROM user WHERE BINARY uid='".$safeUserId."'";
		$result=$conn->query($getUserQuery);
		if (mysqli_num_rows($result)!=0) {
			setcookie('muskRemAuth', $safeUserId, time()+3600*24*30*2, '/', 'muskgreen.live', TRUE, TRUE);
			ob_end_flush();
			$row=$result->fetch_assoc();
			session_start();
			$_SESSION['isLoggedIn']=TRUE;
			$_SESSION['userId']=$safeUserId;
			$_SESSION['userFName']=$row['fname'];
			$_SESSION['userLName']=$row['lname'];
			$_SESSION['userPrimeNumber']=$row['primenumber'];
			$_SESSION['userEmail']=$row['email'];
			$_SESSION['orderConfirmed']=FALSE;

			$getUserCart="select count(proid) from usercart where uid='".$safeUserId."'";
			$result=$conn->query($getUserCart);
			$row=$result->fetch_assoc();
			$_SESSION['cartCount']=$row['count(proid)'];
			$_SESSION['transactionFlag']=FALSE;
		}
	}
	$conn->close();
?>