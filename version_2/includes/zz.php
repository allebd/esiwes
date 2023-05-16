<?php
require("constants.php");

	// Create connection
	$connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

	// Check connection
	if ($connection->connect_error) {
	die("Connection failed: " . $connection->connect_error);
	}
?>