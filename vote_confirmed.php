<?php

	$connection = mysqli_connect("localhost","root","","crimeact");

	$vote = $_POST['vote'];
	$crime_id = $_POST['crime'];
	$user_id = $_POST['user'];

	$sql = "UPDATE vote SET vote = $vote WHERE crime_id = $crime_id AND user_id = $user_id";

	mysqli_query($connection, $sql);

?>