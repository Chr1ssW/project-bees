<?php
require("../db/connect.php");
/** I need the array with the locations here */
$location = array();

$sqlSelectLocations = "SELECT location FROM beehive";

if ($stmtSelectLocations = mysqli_prepare($conn, $sqlSelectLocations)) {
    if (mysqli_stmt_execute($stmtSelectLocations) == false) {
        echo mysqli_error($conn);
    }
    mysqli_stmt_bind_result($stmtSelectLocations, $foundLocation);
    mysqli_stmt_store_result($stmtSelectLocations);
    if (mysqli_stmt_num_rows($stmtSelectLocations) != 0) {
        while (mysqli_stmt_fetch($stmtSelectLocations)) {
            array_push($location, $foundLocation);
        }
    }
    mysqli_stmt_close($stmtSelectLocations);
}
// echo "<pre>";
// print_r($location);
// echo "</pre>";
$key = "8HCeTS3WrCGV18OJpEJSH5jvVzGLRkVu";

$markerSting = "";
$mapjsContent = file_get_contents("../js/emptymap.js");

foreach ($location as $address) {
    $addressURL = str_replace(" ", "+", $address);
    $api_url = "http://www.mapquestapi.com/geocoding/v1/address?key=$key&location=$addressURL&outFormat=json&maxResults=1";

    $location_json = file_get_contents($api_url);
    $location_array = json_decode($location_json, true);

    $lat = $location_array["results"][0]["locations"][0]["displayLatLng"]["lat"];
    $lng = $location_array["results"][0]["locations"][0]["displayLatLng"]["lng"];

    $markerSting .= "L.marker([$lat, $lng]).addTo(myMap).bindPopup('$address');" . PHP_EOL;
}

$writeFile = $mapjsContent . PHP_EOL . $markerSting;

$mapjs = fopen("../js/map.js", "w");
fwrite($mapjs, $writeFile);
fclose($mapjs);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <title>Beehive Monitoring System</title>
</head>

<body>
    <?php
    require_once("sidebarAndPopup.php");
    ?>
    <div id="main">
        <header>
            <nav>
                <span>
                    <a href="javascript:void(0)" onclick="openNav()">
                        <img src="../resources/img/menu.png" alt="menu">
                    </a>
                    <a href="index.php">
                        <img src="../resources/img/beeLogo.png" alt="logo">
                    </a>
                    <h2>Beehive Monitoring System</h2>
                </span>
            </nav>
        </header>
        <main>
            <div id="myMap"></div>
        </main>
        <footer></footer>
    </div>
    <script src="../js/scripts.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="../js/map.js"></script>
</body>

</html>