function InitialiseMap()
{
	var crimeIcon = {
		url: "assets/images/crimeicon.png",
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(17, 34),
		scaledSize: new google.maps.Size(50, 50)
	};

	var geu = {lat: 30.273471, lng: 77.999716};
	var map = new google.maps.Map(document.getElementById('crimemap'),
	{
		zoom: 14,
		center: geu
	});

	var markPoint = new google.maps.Marker(
	{
		position: geu,
		map: map,
		icon: crimeIcon,
    draggable: true
	});

	var search = document.getElementById('crimelocation');
	var searchBox = new google.maps.places.SearchBox(search);

	var markers = [markPoint];
  var infowindow = [];

  searchBox.addListener('places_changed', function() 
  {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    markers.forEach(function(marker) 
    {
      marker.setMap(null);
    });
    
    markers = [];
    infowindow = [];

    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) 
    {
      if (!place.geometry) 
      {
        console.log("Returned place contains no geometry");
        return;
      }

      $.post("searched_crime_server.php",
      {
          latitude: place.geometry.location.lat(),
          longitude : place.geometry.location.lng()
      },
      function(data, status)
      {
          var latlng = data.split(":");

          for(var x = 0;x<latlng.length-1;x++)
          {
              var locallatlng = latlng[x].split(",");
              var coordinates = {lat: parseFloat(locallatlng[0]), lng: parseFloat(locallatlng[1])};

              markers.push(new google.maps.Marker(
              {
                map: map,
                icon: crimeIcon,
                position: coordinates
              }));
              
              var contentString = "<b>"+locallatlng[2]+"</b><br>"+locallatlng[3];
              infowindow.push(new google.maps.InfoWindow(
              {
                content: contentString
              }));

              markers[markers.length-1].addListener('click', function() 
              {
                infowindow[markers.indexOf(this)].open(map,this);

                for(var i = 0;i<infowindow.length;i++)
                    if(i != markers.indexOf(this))
                        infowindow[i].close();

              });              
          }

      });

      map.panTo(place.geometry.location);
      
    });
  });
}