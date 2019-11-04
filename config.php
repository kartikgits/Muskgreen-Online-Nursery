<?php
	$conn = new mysqli("104.198.75.103","root","root","muskdb");
	if($conn->connect_error) {
		die("Connection Failed!".$conn->connect_error);
	}
?>