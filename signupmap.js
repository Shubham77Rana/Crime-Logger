function InitialiseMap()
{
	var crimeIcon = {
		url: "assets/images/here.png",
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(17, 34),
		scaledSize: new google.maps.Size((90), 90)
	};

	var geu = {lat: 30.273471, lng: 77.999716};
	var map = new google.maps.Map(document.getElementById('crimemap'),
	{
		zoom: 18,
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

    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) 
    {
      if (!place.geometry) 
      {
        console.log("Returned place contains no geometry");
        return;
      }

      markers.push(new google.maps.Marker(
      {
        map: map,
        icon: crimeIcon,
        title: place.name,
        position: place.geometry.location,
        draggable: true
      }));

      map.panTo(place.geometry.location);

      google.maps.event.addListener(markers[markers.length-1],"dragend",function(event)
      {
        var latitude = event.latLng.lat();
        var longitude = event.latLng.lng();

        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude; 

        var latlng = { lat: latitude, lng: longitude};

        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'location': latlng}, function(data, status)
        {
            if(status == "OK")
            {
                if(data[0])
                {
                    document.getElementById('crimelocation').value = data[0].formatted_address;
                }
                else
                {
                    alert("No results found");
                }
            }
            else
            {
                alert("Something went wrong");
            }
        });
      });

      document.getElementById('latitude').value = place.geometry.location.lat();
      document.getElementById('longitude').value = place.geometry.location.lng();

      /*if (place.geometry.viewport) 
      {
        bounds.union(place.geometry.viewport);
      } 
      else 
      {
        bounds.extend(place.geometry.location);
      }*/
    });
    //map.fitBounds(bounds);
  });

  google.maps.event.addListener(markPoint,"dragend",function(event)
  {
      var latitude = event.latLng.lat();
      var longitude = event.latLng.lng();

      document.getElementById('latitude').value = latitude;
      document.getElementById('longitude').value = longitude; 

      var latlng = { lat: latitude, lng: longitude};

      var geocoder = new google.maps.Geocoder;
      geocoder.geocode({'location': latlng}, function(data, status)
      {
          if(status == "OK")
          {
              if(data[0])
              {
                  document.getElementById('crimelocation').value = data[0].formatted_address;
              }
              else
              {
                  alert("No results found");
              }
          }
          else
          {
              alert("Something went wrong");
          }
      });
    });

}