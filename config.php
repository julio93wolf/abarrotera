<?php
	/*Configuración de la base de datos - Conexion*/
	define('USER','gerente');
	define('PASSWORD','12345');
	define('SGDB','mysql');
	define('DB','abarrotera');
	define('SGDB_SERVER','localhost');
	$conexion = new PDO(SGDB.':host='.SGDB_SERVER.';dbname='.DB,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

	/*Variables del sistema*/
	$configuracion['imagenes_permitidas'] = array('image/jpeg','image/pjpeg','image/png','image/gif');

	define('PATH','c:/XAMPP/htdocs/abarrotera/');
?>