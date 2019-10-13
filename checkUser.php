<?php
	require 'config.php';
?>

<?php
	if (isset($_POST['userId'])) {
		$safeUserId = preg_replace('/[^\w ]/','',$_POST['userId']);
		$safePhone = preg_replace('/[^\w+]/','',$_POST['userPno']);
		$insertUserQuery = "INSERT INTO user (uid, primenumber) VALUES ('".$safeUserId."','".$safePhone."')";
		if ($conn->query($insertUserQuery) === TRUE) {
		} else {
		}

		//log in the user
		session_start();
		$_SESSION['isLoggedIn']=TRUE;
	}
	$conn->close();
?>