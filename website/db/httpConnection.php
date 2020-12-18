<?php
//// Receive from TTN
//// $postdata = file_get_contents('https://nhl-stenden-hives.herokuapp.com/website/db/httpConnection.php');
// $ttndtajs = json_decode(file_get_contents('https://nhl-stenden-hives.herokuapp.com/website/db/httpConnection.php'), true);
// if ($ttndtajs) {
//     echo 'works';
// } else {
//     echo 'no';
// }

header("Content-type: application/json");
$json = file_get_contents('https://nhl-stenden-hives.herokuapp.com/website/db/httpConnection.php');
$obj = json_decode($json, JSON_PRETTY_PRINT);
echo json_encode($json, JSON_PRETTY_PRINT);

// foreach ($obj as $data) {
//     //Convert object to array
//     $device = (array)$object;

//     $humid = $device["humidity"];
//     $temp = $device["temperature"];
//     // $weight = $device["Weight"];
//     $device_id = $device["device_id"];
//     $time = $device["time"];
//     $decode = base64_decode(json_encode($obj->de));

//     $fp = @fopen("TMP.txt", "a");
//     fwrite($fp, $decoded);
//     fwrite($fp, "\r\n");
//     fclose($fp);
//     //Inserts data to database

//     // if ($stmtInsertDataToDb = mysqli_prepare($conn, $insertDataToDb)) {
//     //     mysqli_stmt_bind_param($stmtInsertDataToDb, 'sddids', $device_id, $temp, $temp, $humid, $weight, $time);
//     //     mysqli_stmt_execute($stmtInsertDataToDb);
//     // }
// }
