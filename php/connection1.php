<?php
	$conn = new mysqli("localhost", "root", "", "appliances");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }
	  echo "Connected successfully";
?>