<?php

$ips[0]='http://172.20.13.144/abarrotera/ws/empleado/';
$ips[1]='http://172.20.13.177/abarrotera/ws/empleado/';
//$ips[2]='http://172.20.13.198/abarrotera/ws/empleado/';
$ips[3]='http://172.20.13.176/abarrotera/ws/empleado/';
$ips[4]='http://172.20.13.103/abarrotera/ws/empleado/';
$ips[5]='http://172.20.13.121/abarrotera/ws/empleado/';
$ips[6]='http://172.20.13.86/Abarrotera/ws/ejemplo/empleado/';
$ips[7]='http://172.20.13.154/abarrotera/ws/empleado/';
$ips[8]='http://172.20.13.102/Abarrotera/ws/empleado/';
//$ips[9]='http://172.20.13.122/abarrotera/ws/empleado/';
$ips[10]='http://172.20.13.101/abarrotera/ws/empleado/';

$datos=array();
$i=0;
foreach ($ips as $key => $value) {
  $url=$value;
  echo $url."<br />";
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "postman-token: a93d8788-152d-07b7-dda0-cb604698fe84"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    $json = json_decode($response);
    foreach ($json as $key => $value) {
      foreach ($value as $key => $value2) {
        if (isset($value->nombre)) {
          $empleado[$i]['nombre']=$value->nombre;
        }
        if (isset($value->amaterno)) {
          $empleado[$i]['apaterno']=$value->amaterno;
        }
        if (isset($value->apaterno)) {
          $empleado[$i]['amaterno']=$value->apaterno;
        }        
      }
      $i++;
    }
  }
}
echo "<pre>";
print_r($empleado);
echo "</pre>";
die();
?>
<table>
  <tr>
    <th>Nombre</th>
    <th>Paterno</th>
    <th>Materno</th>
  </tr>

<?php
  foreach ($datos as $key => $value1){
    foreach ($value1 as $keyVal1 => $value2){
      foreach ($value2 as $keyVa2 => $value3){
        echo '<tr>';
          echo '<td>'.$value3->nombre.'</td>';
          echo '<td>'.$value3->apaterno.'</td>';
          echo '<td>'.$value3->amaterno.'</td>';
        echo '</tr>';
      }
    }
  }
?>
</table>

