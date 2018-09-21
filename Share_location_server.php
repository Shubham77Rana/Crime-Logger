<?php

	session_start();

	$connection = mysqli_connect("localhost","root","","crimeact");

	$latitude = mysqli_real_escape_string($connection, $_GET['latitude']);
	$longitude = mysqli_real_escape_string($connection, $_GET['longitude']);
	$address = mysqli_real_escape_string($connection, $_GET['address']);

	$user_id = $_SESSION['id'];

	$sql = "UPDATE registeruser SET address = '$address', latitude = $latitude, longitude = $longitude WHERE id = $user_id";

	$result = mysqli_query($connection, $sql) or die("failed"); 

	echo "location_updated_successfully";

?>