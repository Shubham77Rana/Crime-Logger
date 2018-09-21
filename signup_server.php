<?php
	
	session_start();

	$connection = mysqli_connect("localhost","root","","crimeact");

	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$latitude = mysqli_real_escape_string($connection, $_POST['latitude']);
	$longitude = mysqli_real_escape_string($connection, $_POST['longitude']);

	if(isset($_POST['address']))
		$address = mysqli_real_escape_string($connection, $_POST['address']);
	else $address = "nothing";

	$emailexist = "SELECT email FROM registeruser WHERE email = '$email'";

	if(mysqli_num_rows(mysqli_query($connection, $emailexist)) == 1)
	{
		echo "emailexist";
		return;
	}

	$sql = "INSERT INTO registeruser (name, email, password, address, latitude, longitude) VALUES('$name', '$email', '$password', '$address', $latitude, $longitude)";

	if(!mysqli_query($connection, $sql))
	{
		echo "registrationfailed";
		return;
	}

	$code = mt_rand(100000,999999);
	$sql = "INSERT INTO verification (code, email) VALUES('$code','$email')";

	if(!mysqli_query($connection, $sql))
	{
		echo "registrationfailed";
		return;
	}

	$message = "To verify your mail, enter below verification code at verify_signup_html.php:<br>
		Verification code : ".$code;

	include("mail_function.php");
	$mail->Subject="Verify your email address";
	$mail->Body = $message;
	$mail->AddAddress($email);
	if(!$mail->Send())
	{
		echo "Mail Error".$mail->ErrorInfo;
		return;
	}

	echo "registrationcomplete";

	$_SESSION['email'] = $email;
	//$_SESSION['name'] = $name;

    $sql = "SELECT id FROM registeruser WHERE email = '$email'";

    $userDetails = mysqli_fetch_array(mysqli_query($connection, $sql));

    $_SESSION['id'] = $userDetails['id'];
?>