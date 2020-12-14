<?php
//Receive from TTN
// $postdata = file_get_contents('https://nhl-stenden-hives.herokuapp.com/website/db/httpConnection.php');
$ttndtajs = json_decode(file_get_contents('https://nhl-stenden-hives.herokuapp.com/website/db/httpConnection.php'), true);
if ($ttndtajs) {
    echo 'works';
} else {
    echo 'no';
}
