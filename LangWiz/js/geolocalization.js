
function getLocation() //ID just to display error message
 {
    //verifies if the browser support
  if (navigator.geolocation) {
    window.alert("test");
    navigator.geolocation.getCurrentPosition(success);
    }else {
    alert("Geolocation is not supported by this browser.");
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

function success(position) {
  position = navigator.geolocation.getCurrentPosition(success);
  latitude = position.coords.latitude;
  longitude = position.cords.longitude;
  alert(longitude + latitude);
  return crd;
};

function error(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
};

navigator.geolocation.getCurrentPosition(success, error, options);