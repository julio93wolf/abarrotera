<?php
	header('Content-Type: text/html; charset=UTF-8');
	include("config.php");
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Abarrotera Galaxia</title>
	<meta charset="utf-8">
	<meta name="autor" content="Valle Rodriguez Julio Cesar">
	<meta name="description" content="Abarrotera con precios competitivos">
	<meta name="keywords" content="producto mayoreo menudeo ofertas celaya cortazar">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div id="wrapper">
		<header>
			<div id="logo">
				<img src="image/logo.jpg" height="250" width="735" alt="Logo" />
			</div>
			<div id="busqueda">
				<form method="GET" action="busqueda.php">
					<input type="text" name="q" placeholder="Busqueda" />
				</form>
			</div>
			<div id="login">
				<ul>
					<li><a href="registro.php">Registro</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</header>
		<nav>
			<ul>	
				<li><a href="index.php">Inicio</a></li>
				<li><a href="quienes_somos.php">Quiénes Somos</a></li>
				<li><a href="productos.php">Productos</a></li>
				<li><a href="promociones.php">Promociones</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</nav>
		<div id="content">
			<section>
				<div id="info">