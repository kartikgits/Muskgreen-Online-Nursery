<?php
	require 'config.php';
?>

<?php
	//make this authentication more strong using firebase auth
	if (isset($_POST['userId'])) {
		$safeUserId = preg_replace('/[^\w ]/','',$_POST['userId']);
		$safePhone = preg_replace('/[^\w+]/','',$_POST['userPno']);
		$insertUserQuery = "INSERT INTO user (uid, primenumber) VALUES ('".$safeUserId."','".$safePhone."')";
		if ($conn->query($insertUserQuery) === TRUE) {
		} else {
		}

		//log in the user
		$getUserQuery = "SELECT * FROM user WHERE uid='".$safeUserId."'";
		$result=$conn->query($getUserQuery);
		$row=$result->fetch_assoc();
		session_start();
		$_SESSION['isLoggedIn']=TRUE;
		$_SESSION['userId']=$safeUserId;
		$_SESSION['userFName']=$row['fname'];
		$_SESSION['userLName']=$row['lname'];
		$_SESSION['userPrimeNumber']=$row['primenumber'];
		$_SESSION['userEmail']=$row['email'];

		$getUserCart="select count(proid) from usercart where uid='".$safeUserId."'";
		$result=$conn->query($getUserCart);
		$row=$result->fetch_assoc();
		$_SESSION['cartCount']=$row['count(proid)'];
	}
	$conn->close();
?>