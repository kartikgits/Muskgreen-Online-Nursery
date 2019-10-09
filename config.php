<?php
	$conn = new mysqli("localhost","root","","musktest");
	if($conn->connect_error) {
		die("Connection Failed!".$conn->connect_error);
	}
?>