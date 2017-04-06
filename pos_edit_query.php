<?php
	require_once 'conn.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$apiusername = $_POST['apiusername'];
	$apipassword = $_POST['apipassword'];
	$status = $_POST['status'];
	$location = $_POST['location'];
	$serial = $_POST['serial'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];
	$conn->query("UPDATE `member` SET `username` = '$username', `apiusername` = '$apiusername', `location` = '$location', `serial` = '$serial', `status` = '$status' WHERE `mem_id` = '$_REQUEST[mem_id]'") or die(mysqli_error());