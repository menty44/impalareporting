<?php
	require_once 'conn.php';
	$username = $_POST['username'];
	$apiusername = $_POST['apiusername'];
	$query = $conn->query("SELECT * FROM `member` WHERE `username` = '$username' && `apiusername` = '$apiusername'") or die(mysqli_error());
	$validate = $query->num_rows;
	if($validate > 0){
		echo "Error";
	}else{
		echo "Success";
	}