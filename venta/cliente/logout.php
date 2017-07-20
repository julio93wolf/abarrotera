<?php
	include_once('../abarrotera.class/php');
	$rol[0]='Cliente';
	$abarrotera->guardia($rol);
	session_destroy();
	header('Location: /abarrotera/venta/login');
?>