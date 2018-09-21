<?php

	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

	$connection = mysqli_connect("localhost","root","","crimeact");

	$sql = "SELECT title, description, latitude,longitude FROM loggedcrime WHERE 100 * SQRT(POWER($latitude-latitude,2) + POWER($longitude-longitude,2)) <= 2 AND archive = 0";

	$result = mysqli_query($connection, $sql);

	while($latlng = mysqli_fetch_array($result))
	{
		echo $latlng['latitude'].",".$latlng['longitude'].",".$latlng['title'].",".$latlng['description'].":";
	}

?>