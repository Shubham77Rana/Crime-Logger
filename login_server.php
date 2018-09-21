<?php
	
	session_start();
	
	$connection = mysqli_connect("localhost","root","","crimeact");

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	$sql = "SELECT email, id, name FROM registeruser WHERE email = '$email' AND password = '$password' AND verified=1";

	$result = mysqli_query($connection, $sql);

	if(mysqli_num_rows($result) != 1)
	{
		echo "loginfailed";
		return;
	}

	$userDetails = mysqli_fetch_array($result);

	$_SESSION['email'] = $userDetails['email']; 
	$_SESSION['name'] = $userDetails['name'];
	$_SESSION['id'] = $userDetails['id'];

	echo "loginsuccessful";

?>