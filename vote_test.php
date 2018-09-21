<?php

	$connection = mysqli_connect("localhost","root","","crimeact");
	
	$crime_id = $_GET['di'];
	$crime_id = substr($crime_id, 12, -12);

	$user_id = $_GET['id'];
	$user_id = substr($user_id, 12, -12);

	$sql = "SELECT description, address FROM loggedcrime WHERE id = $crime_id";

	$details = mysqli_fetch_array(mysqli_query($connection, $sql));

	echo $details['description']."<br>".$details['address'];

?>