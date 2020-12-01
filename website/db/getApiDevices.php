<?php
$service_url = 'https://data_test_application.data.thethingsnetwork.org';
echo "<pre>";
print_r(get_headers($service_url));
echo "</pre>";
//---------------------2
// $url = 'https://data_test_application.data.thethingsnetwork.org/swagger.yaml';
// // $url = 'https://data_test_application.data.thethingsnetwork.org/api/v2/devices';
// $json = file_get_contents("$url");

// $data = json_decode($json);
// echo "<pre>";
// print_r($data);
// echo "</pre>";

// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, 'https://data_test_application.data.thethingsnetwork.org');
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// // curl_setopt($curl, CURLOPT_POSTFIELDS, ' key ttn-account-v2._6fl9v7CukvAe1uw6AtT10U_L1EaFRwq-2pWlK4dC1Q');
// curl_exec($curl);
