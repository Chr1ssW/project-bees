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
$json = file_get_contents("php://input");
$obj = json_decode($json);
foreach ($obj as $id) {
    echo $id;
}

$decode = base64_decode(json_encode($obj->data));

$fp = @fopen("TMP.txt", "a");
fwrite($fp, $decoded);
fwrite($fp, "\r\n");
fclose($fp);
