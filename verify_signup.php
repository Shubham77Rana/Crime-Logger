<?php

	session_start();

	$connection = mysqli_connect("localhost","root","","crimeact");

	$code = mysqli_real_escape_string($connection, $_POST['code']);

	if(!isset($_SESSION['email']))
	{
		header("Location: index.php");
		return;
	}

	$email = $_SESSION["email"];

	$sql = "SELECT email FROM verification WHERE email = '$email' AND code = '$code'";

	if(mysqli_num_rows(mysqli_query($connection, $sql)) == 1)
	{
		echo "verificationsuccess";

		$sql = "UPDATE registeruser SET verified = 1 WHERE email = '$email'";
		mysqli_query($connection, $sql);

		$sql = "DELETE FROM verification WHERE email = '$email'";
		mysqli_query($connection, $sql);

		echo $sql;

		return;
	}

	echo "verificationfailed";

?>