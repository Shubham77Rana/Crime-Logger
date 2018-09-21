<?php

	session_start();

	$connection = mysqli_connect("localhost","root","","crimeact");

	if(!isset($_SESSION['email']))
	{
		header("Location: login.php");
		return;
	}
	else
	{
		$email = $_SESSION['email'];
	}

	$title = mysqli_real_escape_string($connection, $_POST['crimetitle']);
	$description = mysqli_real_escape_string($connection, $_POST['description']);
	$time = mysqli_real_escape_string($connection, $_POST['timeofcrime']);
	$date = mysqli_real_escape_string($connection, $_POST['dateofcrime']);
	$location = mysqli_real_escape_string($connection, $_POST['crimelocation']);
	$latitude = mysqli_real_escape_string($connection, $_POST['latitude']);
	$longitude = mysqli_real_escape_string($connection, $_POST['longitude']);


	$sql = "INSERT INTO loggedcrime (logger_email, title, description, time, date, latitude, longitude, address) VALUES('$email', '$title', '$description', '$time', '$date', $latitude, $longitude, '$location')";

	mysqli_query($connection, $sql);

	
	//fetching the id for just logged crime
	$sql = "SELECT id FROM loggedcrime WHERE latitude = $latitude AND longitude = $longitude AND logger_email = '$email'";
	$result = mysqli_fetch_array(mysqli_query($connection, $sql));

	$crime_id = $result['id'];
	$user_id = $_SESSION['id'];

	// Sending emails to nearby people

	$sql = "SELECT id,name,email FROM registeruser WHERE 100 * SQRT(POWER($latitude-latitude,2) + POWER($longitude-longitude,2)) <= 2 AND verified = 1 AND email != '$email'";

	$result = mysqli_query($connection, $sql);

	include("mail_function.php");
	$mail->Subject="Crime Reported in your Area";
	
	while($userDetail = mysqli_fetch_array($result))
	{
		$user_user_id = $userDetail['id'];
		include("votelinkgenerate.php");

		$message = "To vote for the recent reported crime in your area, follow the below link:<br>
			Link : ".$link;

		//echo $userDetail['email']." --> ".$message."<br>";

		$mail->Body = $message;
		$mail->AddAddress($userDetail['email']);
		$mail->Send();

		$sql = "INSERT INTO vote (crime_id, user_id) VALUES($crime_id, $user_user_id)";
		mysqli_query($connection, $sql);
	}

	header("Location: vote_time_event.php?id=$crime_id");

?>