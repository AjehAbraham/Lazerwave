<?php

$apiKey="655c47857e80513855655c47857e84f1964533291";
$type ="validate";
$token ="663337201494406";

//$url =  "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip_addr;

$url = "http://localhost/lazerwave/Apis?api-token=". $apiKey."&type=". $type. "&token=".$token;

$curl = curl_init($url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($curl);
curl_close($curl);


//$response = json_encode($response);

$response = json_decode($response, true);


echo "<br>" . $response[0];
