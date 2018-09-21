$(document).ready(function()
{
	$('#sharelocation').click(function()
	{
		var latitude = $('#latitude').val();
		var longitude = $('#longitude').val();
		var address = $('#crimelocation').val();

		if(latitude != 0 && longitude != 0)
		{
			$.get("share_location_server.php",
			{
				latitude: latitude,
				longitude: longitude,
				address: address
			}, 
			function(data, status)
			{
				if(data == "location_updated_successfully")
				{
					alert("Done!! Sharing your Location");
					window.location = "index.php";
				}
				else
				{
					alert("Something went wrong, Try again");
				}
			});
		}
		else
		{
			alert("Your location doesn't seems correct or something went wrong");
		}
	});
});