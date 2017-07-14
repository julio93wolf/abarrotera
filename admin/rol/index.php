<?php
	include_once('../abarrotera.class.php');
	include('../header.php');
	$datos=$abarrotera->consultar("select * from rol;");
	echo '<a class="btn btn-success" href="nuevo.php" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>';
	echo '<table class="table table-hover">';
	echo '<tr>';
	echo '<th>Rol</th>';
	echo '<th>Editar</th>';
	echo '<th>Eliminar</th>';
	echo '</tr>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
			echo '<td>'.$value['rol'].'</td>';
			echo '<td><a class="btn btn-primary" href="editar.php?id_rol='.$value['id_rol'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
			echo '<td><a class="btn btn-danger" href="eliminar.php?id_rol='.$value['id_rol'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	include('../footer.php');
?>