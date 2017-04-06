<?php
	$conn = new mysqli('localhost', 'root', '', 'report');
	if(!$conn){
		die('Could not Connect to Database' . $conn->mysqli_error );
	}