<?php 

	session_start();

	if(!isset($_SESSION['email']))
	{
		header("Location: index.php");
		return;
	}

	$connection = mysqli_connect("localhost","root","","crimeact");

	$email = $_SESSION['email'];

	$sql = "SELECT code FROM VERIFICATION WHERE email = '$email'"
	$result = mysqli_query($connection, $sql);

	if(mysqli_num_rows($result) == 0)
	{
		echo "Something went wrong";
		return;
	}

	$row = mysqli_fetch_array($result);
	$code = $row['code'];

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

	echo "sentsuccessfully";
?>