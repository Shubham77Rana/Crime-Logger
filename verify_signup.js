$(document).ready(function()
{
	$("#formid").submit(function(event)
	{
		event.preventDefault();
		$("#loadinggif").show();

		var code = $("#verification").val();

		$.post("verify_signup.php",
		{
			code : code
		},
		function(data, status)
		{
			if(data.indexOf("verificationfailed") != -1)
			{
				$("#verificationfailed").show();
				$("#verification").css("border","1px solid red");
				$("#loadinggif").hide();
				return;
			}

			if(data.indexOf("verificationsuccess") != -1)
			{
				alert("verification Successful");
				window.location = "index.php";
				return;
			}

			alert("Something went wrong");
			$("#loadinggif").hide();

		});
	});

	$("#verification").focus(function()
	{
		$("#verification").css("border","1px solid rgba(0,0,0,0.08)");
		$("#verificationfailed").hide();
	});

	$("#resentmail").click(function()
	{
		$.post("resent_mail.php",{},function(data, status)
		{
			if(data.indexOf("sentsuccessfully") != -1)
			{
				alert("mail sent again");
			}
			else if(data.indexof("Something went wrong") != -1)
			{
				alert("You are not registered yet");
			}
			else
			{
				alert("Something went wrong, Try again");
			}
		});
	});

});