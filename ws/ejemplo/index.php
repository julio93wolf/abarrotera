<?php
	include('../../admin/abarrotera.class.php');
	$datos=$abarrotera->consultar('select * from empleado');
	header('Content-Type: application/json');
	$json=json_encode($datos);
	echo $json;
?>