$(document).ready(function()
{
	$("#yes").click(function()
	{
		var crime = $("#crime").val();
		var user = $("#user").val();
		$.post("vote_confirmed.php",
		{
			vote: 1,
			crime: crime,
			user: user
		});

		alert("Yes option selected");
		window.location = "index.php";
	});

	$("#no").click(function()
	{
		var crime = $("#crime").val();
		var user = $("#user").val();
		$.post("vote_confirmed.php",
		{
			vote: 2,
			crime: crime,
			user: user
		});

		alert("No option selected");
		window.location = "index.php";
	});

	$("#dontknow").click(function()
	{
		var crime = $("#crime").val();
		var user = $("#user").val();
		$.post("vote_confirmed.php",
		{
			vote: 3,
			crime: crime,
			user: user  
		});

		alert("Don't know option selected");
		window.location = "index.php";
	});	

});