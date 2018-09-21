$(document).ready(function()
{
	$("#formid").submit(function(event)
	{
		event.preventDefault();

		var name = $("#name").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var latitude = $("#latitude").val();
		var longitude = $('#longitude').val();
		var address = $("#crimelocation").val();

		$('#loadinggif').show();

		$.post("signup_server.php",
		{
			name : name,
			email : email,
			password : password,
			latitude : latitude,
			longitude : longitude,
			address : address
		},
		function(data, status)
		{
			if(data.indexOf("emailexist") != -1)
			{
				$("#email").css("border-color","red");
				$("#emailexist").show();
				$('#loadinggif').hide();
				return;
			}

			if(data.indexOf("registrationcomplete") != -1)
			{
				window.location = "verify_signup_html.php";
				return;
			}

			$('#loadinggif').hide();
			alert("Something went wrong");

		});
	});

	$("#email").focus(function()
	{
		$("#emailexist").hide();
		$("#email").css("border","1px solid rgba(0,0,0,0.08)");
	});

});