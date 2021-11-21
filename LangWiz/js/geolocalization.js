
function getLocation() //ID just to display error message
 {
    //verifies if the browser support
  if (navigator.geolocation) {
    window.alert("Working until here2"); //#testing
    navigator.geolocation.getCurrentPosition(success);
    }else {
    alert("Geolocation is not supported by this browser.");
  }
}

function getDistance(latX, longX, latY, longY)
{
  distKM = Math.sqrt((latX-latY)**2 + (longX-longY)**2);
  return distKM;
}

function success(position) {
  var latitude = position.coords.latitude;
  alert(latitude);
  var longitude = position.coords.longitude;
  alert(longitude);
  //Now we just have to pass the values to the function in php to get the city
  //something like this
  var arrContryAndCity = <?php include_once '../phpFiles/geolocalization.php';echo getNearPlaces(1,1,latitude,longitude);?>;
  document.getElementById("firstOption").innerHTML = arrContryAndCity[0];
  document.getElementById("cityFirstOption").innerHTML = arrContryAndCity[1];
};

function error(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
};
