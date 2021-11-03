<?php
function getNearPlaces($distanceKM, $limitDisplay, $lat, $long) {
    require_once 'configurationdb';
    $arCities = array();
    define($EARTH_APROX_RADIUS, 6371);
    $queryId = mysqli_query($conection, $sqlStmt);
    $sqlQuery = "SELECT g.GeopositioningID, l.City, l.Country,
                ($EARTH_APROX_RADIUS * acos(
                 cos( radians($lat) )
                 * cos( radians( g.GeoLat ) )
                 * cos( radians( g.GeoLong ) - radians($long) )
                 + sin( radians($lat) )
                 * sin( radians( g.GeoLat ) )
                 )) AS Distance
                FROM geolocalization g
                join location l ON g.GeopositioningID = l.GeopositioningID
                HAVING Distance < 25
                ORDER BY Distance ASC
                LIMIT $limitDisplay;";
    if($queryId)
    {
        while($rec = mysqli_fetch_assoc($queryId))
        {
            $City=$rec["City"];
            $Country= $rec["Country"];
            $arCities[$City]=$Country;
        }
        return $arCities;
    }   
}
?>