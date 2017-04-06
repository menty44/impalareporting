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
	$conn->query("INSERT INTO `member` VALUES('', '$username', '$password', '$apiusername', '$apipassword', '$status', '$location', '$serial', '$longitude', '$latitude')") or die(mysqli_error());


		
