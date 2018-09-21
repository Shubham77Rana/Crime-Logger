<?php

	include ("Mails/classes/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->IsHTML(true);
	$mail->Username = "shubhamandresrana132@gmail.com";
	$mail->Password = "kunwar77exception";
	$mail->SetFrom("Shubham@CrimeLogger.com");
	/*$mail->Subject="MailTest";
	$mail->Body = "Nothing just testing";
	$mail->AddAddress("shubhamrana132@gmail.com");
	if(!$mail->Send())
	{
		echo "Mail Error".$mail->ErrorInfo;
	} 
	else
	{
		echo "Message is sent!!";
	}*/

?>