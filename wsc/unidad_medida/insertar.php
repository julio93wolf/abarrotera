<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://172.20.13.144/abarrotera/ws/unidad_medida/index.php?id=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "[\n    {\n        \"unidad_medida\": \"Prueba Julio\"\n    }\n]",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: e2dedfb0-be46-564c-7cfc-597aa9998063"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $json=json_decode($json);
  print_r($json);
}