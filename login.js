$(document).ready(function()
{
	$("#loginform").submit(function(event)
	{
		event.preventDefault();

		var email = $("#email").val();
		var password = $("#password").val();

		$('#loadinggif').show();

		$.post("login_server.php",
		{
			email: email,
			password: password
		},
		function(data, status)
		{
			if(data.indexOf("loginsuccessful") != -1)
			{
				window.location = "index.php";
				return;
			}

			if(data.indexOf("loginfailed") != -1)
			{
				$("#invalid").show();
				$("#email").css("border","1px solid red");
				$("#password").css("border","1px solid red");
				$('#loadinggif').hide();
				return;
			}

			$('#loadinggif').hide();
			alert("Something went wrong");
		});
	})

	$("#email").focus(function()
	{
		$("#invalid").hide();
		$("#email").css("border","1px solid rgba(0,0,0,0.08)");
		$("#password").css("border","1px solid rgba(0,0,0,0.08)");
	});


	$("#password").focus(function()
	{
		$("#invalid").hide();
		$("#email").css("border","1px solid rgba(0,0,0,0.08)");
		$("#password").css("border","1px solid rgba(0,0,0,0.08)");
	});
});