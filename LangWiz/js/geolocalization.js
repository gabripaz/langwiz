
function getLocation(documentTagID) //ID just to display error message
 {
    //verifies if the browser support
  if (navigator.geolocation) {
    position = navigator.geolocation.getCurrentPosition();
    latitude = position.coords.latitude;
    longitude = position.cords.longitude;
    return (latitude,longitude);

  } else {
    documentTagID.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(documentTagID, position) {
  documentTagID.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}

function getDistance(latX, longX, latY, longY)
{
  distKM = Math.sqrt((latX-latY)**2 + (longX-longY)**2);
  return distKM;
}