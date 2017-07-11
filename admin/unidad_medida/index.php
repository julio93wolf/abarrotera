<?php
	include('../abarrotera.class.php');
	include('../header.php');
	$datos=$abarrotera->consultar("select * from unidad_medida;");
	echo '<a class="btn btn-success" href="#" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>';
	echo '<table class="table table-hover">';
	echo '<tr>';
	echo '<th>Unidad de Medida</th>';
	echo '<th>Editar</th>';
	echo '<th>Eliminar</th>';
	echo '</tr>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
			echo '<td>'.$value['unidad_medida'].'</td>';
			echo '<td><a class="btn btn-primary" href="editar.php?id_unidad_medida='.$value['id_unidad_medida'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
			echo '<td><a class="btn btn-danger" href="eliminar.php?id_unidad_medida='.$value['id_unidad_medida'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	include('../footer.php');
?>