<?php 
	$servername = "db4free.net";
	$port = "3306";
	$username = "mrjiro9x";
	$password = "abcd1234";
	$dbname = "dbgch17133";
	
	$conn = new mysqli($servername . ":". $port , $username, 
		$password, $dbname);
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}	 

	echo "Connection Successfully!";
 ?>