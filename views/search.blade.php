<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BinBuddy - Search Nearby Recycling Centres</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe2Z51I3yHqpTqvR5n06t8WZIbhLd8R7E&libraries=places"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #e2f0da; }
    .bar { cursor: pointer; transition: background 0.3s; }
    .level-step { cursor: pointer; }
    #map {
        height: 100vh;
        width: 100%;
    }
  </style>
</head>
<body>
  <header class="flex items-center justify-between bg-white px-6 py-4 shadow-md">
    <div class="flex items-center space-x-4 w-full max-w-6xl">
      <img src="/logo.jpg" alt="BinBuddy Logo" class="h-10" />
      <div class="relative flex-grow max-w-xl">
        <input id="locationInput" type="text" placeholder="Search for nearby recycling centres" class="w-full rounded-full border border-gray-300 py-2 px-4 pl-10 pr-10" onkeydown="if (event.key === 'Enter') redirectToMap()"/>
        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
      </div>
    </div>
    <nav class="flex space-x-6 text-lg font-medium ml-6">
      <a href="/homepage" class="text-black">Home</a>
      <a href="/tutorial" class="text-black">Tutorials</a>
      <a href="/about" class="text-black">About</a>
      <a href="/profile">
        <img src="/profile.jpg" class="h-10 rounded-full" alt="Profile" />
      </a>
    </nav>
  </header>

   <div id="map"></div>

  <script>
    function redirectToMap() {
    const location = document.getElementById('locationInput').value.trim();
    if (location) {
      window.location.href = `/search?location=${encodeURIComponent(location)}`;
    }
   } 

   function getLocationFromQuery(){
    const params = new URLSearchParams(window.location.search);
    return params.get('location') || 'Kuala Lumpur';
   }

   function initMap(){
    const inputLocation = getLocationFromQuery();
    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({ address: inputLocation }, function (results, status) {
        if (status === 'OK') {
          const map = new google.maps.Map(document.getElementById('map'), {
            center: results[0].geometry.location,
            zoom: 14
      });

       const infowindow = new google.maps.InfoWindow();

          const marker = new google.maps.Marker({
            map,
            position: results[0].geometry.location
          });

          const service = new google.maps.places.PlacesService(map);
          const request = {
            location: results[0].geometry.location,
            radius: 5000,
            keyword: 'recycling center'
          };

      service.nearbySearch(request, (results, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
              results.forEach(place => {
                const marker = new google.maps.Marker({
                  map,
                  position: place.geometry.location,
                  icon: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png'
                });

                google.maps.event.addListener(marker, 'click', () => {
                  infowindow.setContent(`<strong>${place.name}</strong><br>${place.vicinity}`);
                  infowindow.open(map, marker);
                });
              });
            } else {
              alert('No recycling centers found nearby.');
            }
          });
        } else {
          alert('Could not locate the place: ' + status);
        }
      });
    }

    window.onload = initMap;  
</script>
</body>
</html>
