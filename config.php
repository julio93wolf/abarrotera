<?php
	header('Content-Type: text/html; charset=UTF-8');
	$user='gerente';
	$password='12345';
	$conexion = new PDO('mysql:host=localhost;dbname=abarrotera', $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
?>