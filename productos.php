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
				<li><a href="index.html">Inicio</a></li>
				<li><a href="quienes_somos.html">Quiénes Somos</a></li>
				<li><a href="productos.php">Productos</a></li>
				<li><a href="promociones.html">Promociones</a></li>
				<li><a href="contacto.html">Contacto</a></li>
			</ul>
		</nav>
		<div id="content">
			<section>
				<div id="info">
					<h1>Productos</h1>
					<div id="producto">
						<table>
						<?php
							include("config.php");
							$i=0;
							foreach($conexion->query('select * from productos_view') as $fila) {
								if($i<=0){
						        	echo "<tr>";
						        }
						        echo "<td>";
						        	echo '<div class="normal"><img src="image/productos/'.$fila['imagen'].'" width="80px" height="80px"></div>';							
							        echo '<h3>'.$fila['producto'].'</h3>';
							        echo '<span class="gamage">'.$fila['presentacion'].' '.$fila['unidad_medida'].'</span><br />';
							        echo '<span class="p_real">$'.$fila['preciou'].'</span>';
							        echo '<span class="descuento"></span><br />';
							        echo '<span class="p_descuento">$'.$fila['cantidadm'].'</span><br />';
							        echo '<span class="p_mayoreo">$'.$fila['preciom'].'</span>';
						        echo "</td>";
						        $i++;
						        if($i>=4){
						        	echo "</tr>";
						        	$i=0;
						        }
						    }
						    $conexion=null;
						?>
						</table>
					</div>
				</div>
			</section>
			<aside>
				<div id="destacados">
					Top de productos consultadas desde la base de datos
				</div>
				<div id="nuevos">
					Productos nuevos consultadas desde la base de datos
				</div>
			</aside>
		</div>
		<footer>
			<div id="menu_inferior">
				<div class="columna_inferior">
					<h1>Sucursales</h1>
					<ul>
						<li><a href="sucursales.html">Sucursales</a></li>
						<li><a href="mapa_ubicacion.html">Mapa de Ubicacion</a></li>
						<li><a href="horario.html">Horario</a>	</li>
					</ul>
				</div>				
				<div class="columna_inferior">
					<h1>Ayuda</h1>
					<ul>
						<li>
							<a href="ayuda.html">Ayuda</a>
						</li>	
					</ul>
				</div>				
				<div class="columna_inferior">
					<h1>Clientes</h1>
					<ul>
						<li><a href="atencion_clientes.html">Atencion al Cliente</a></li>
					</ul>
				</div>
				<div class="columna_inferior">
					<h1>Proveedores</h1>
					<ul>
						<li><a href="proveedores.php">Proveedores</a></li>
					</ul>
				</div>				
				
			</div>
			<div id="redes_sociales">
				<a href="https://www.facebook.com" target="_blank"><img src="http://www.ipermercato-online.it/images/social/facebook.png" height="32" width="32" alt="Facebook" /></a>
				<a href="https://www.twitter.com" target="_blank"><img src="https://www.aciprensa.com/icons/32x32/twitter.png" height="32" width="32" alt="Twitter" />
			</div>
		</footer>
	</div>
</body>
</html>
