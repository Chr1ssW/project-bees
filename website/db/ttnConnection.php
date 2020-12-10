<?php
include("connect.php");

echo "Welcome to index page</br>";
echo "Page will refresh in every 3 seconds</br></br>";

// The function will refresh the page  
// in every 3 second 
// header("refresh: 5");

echo date('H:i:s Y-m-d');

// exit; 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://data_test_application.data.thethingsnetwork.org/api/v2/query');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: key ttn-account-v2._6fl9v7CukvAe1uw6AtT10U_L1EaFRwq-2pWlK4dC1Q';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$data = json_decode($result);


$insertDataToDb = "INSERT INTO beehive_data VALUES(NULL,1,?,?,?,?,?,?)";
// $checkIfBeehiveIsInDatabase = "SELECT sensorID FROM beehive WHERE sensorID=?";
// $updateBeehiveData = "UPDATE readings SET internalTEmp='?',externalTemp='?',humidity='?',weight='?',timeStamp='?' WHERE sensor_ID='?'";

$humid = 0;
$temp = 0;
$weight = 0;;
$device_id = "";
$time = "";
foreach ($data as $object) {
    //Convert object to array
    $device = (array)$object;

    $humid = $device["humidity"];
    $temp = $device["temperature"];
    // $weight = $device["Weight"];
    $device_id = $device["device_id"];
    $time = $device["time"];

    //Inserts data to database

    if ($stmtInsertDataToDb = mysqli_prepare($conn, $insertDataToDb)) {
        mysqli_stmt_bind_param($stmtInsertDataToDb, 'sddids', $device_id, $temp, $temp, $humid, $weight, $time);
        mysqli_stmt_execute($stmtInsertDataToDb);
    }
}

echo "<pre>";
var_dump($data);
echo "</pre>";

$file = "informationFromSwaggerApi.txt";
$fileOpen = fopen($file, "wb");
// fwrite($fileOpen, $result);


if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
