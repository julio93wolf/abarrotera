<?php
	include('../abarrotera.class.php');
	include('../header.php');
	$datos=$abarrotera->consultar("select * from sucursal order by sucursal asc");
	echo '<a class="btn btn-success" href="#" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>';
	echo '<table class="table table-hover">';
	echo '<tr>';
	echo '<th>Sucursal</th>';
	echo '<th>Editar</th>';
	echo '<th>Eliminar</th>';
	echo '</tr>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
			echo '<td>'.$value['sucursal'].'</td>';
			echo '<td><a class="btn btn-primary" href="editar.php?id_sucursal='.$value['id_sucursal'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
			echo '<td><a class="btn btn-danger" href="eliminar.php?id_sucursal='.$value['id_sucursal'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	include('../footer.php');
?>