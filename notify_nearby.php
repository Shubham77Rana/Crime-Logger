<?php

	$connection = mysqli_connect("localhost","root","","crimeact");

	$latitude = 30.274185;
	$longitude = 78.003844;

	$sql = "SELECT * FROM registeruser";
	$result = mysqli_query($connection, $sql);

	while($userDetail = mysqli_fetch_array($result))
	{
		$userLatitude = $userDetail['latitude'];
		$userLongitude = $userDetail['longitude'];
		
		$distance = sqrt(pow($latitude - $userLatitude, 2) + pow($longitude - $userLongitude, 2));
		$distance = 100 * $distance;

		// found nearby
		if($distance <= 2)
		{
			echo $userDetail['name']." ";
		}

	}

?>s