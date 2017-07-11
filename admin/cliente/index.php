<?php
	include('../abarrotera.class.php');
	include('../header.php');
	$datos=$abarrotera->consultar("select cli.id_cliente,cli.id_usuario,concat(cli.nombre,' ',cli.apaterno,' ',amaterno) as nom_cliente,usr.correo from cliente cli join usuario usr on cli.id_usuario=usr.id_usuario order by nom_cliente asc");

	echo '<a class="btn btn-success" href="#" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>';
	echo '<table class="table table-hover">';
	echo '<tr>';
	echo '<th>Nombre</th>';
	echo '<th>Correo</th>';
	echo '<th>Editar</th>';
	echo '<th>Eliminar</th>';
	echo '</tr>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
			echo '<td>'.$value['nom_cliente'].'</td>';
			echo '<td>'.$value['correo'].'</td>';
			echo '<td><a class="btn btn-primary" href="editar.php?id_cliente='.$value['id_cliente'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
			echo '<td><a class="btn btn-danger" href="eliminar.php?id_cliente='.$value['id_cliente'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	include('../footer.php');
?>