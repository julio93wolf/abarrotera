<?php
	include_once('../abarrotera.class.php');
	include('../header.php');
	$datos=$abarrotera->consultar("select * from producto pro join marca mar on pro.id_marca=mar.id_marca order by pro.producto asc");

	echo '<a class="btn btn-success" href="#" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>';
	echo '<table class="table table-hover">';
	echo '<tr>';
	echo '<th>Producto</th>';
	echo '<th>Marca</th>';
	echo '<th>Editar</th>';
	echo '<th>Eliminar</th>';
	echo '</tr>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
			echo '<td>'.$value['producto'].'</td>';
			echo '<td>'.$value['marca'].'</td>';
			echo '<td><a class="btn btn-primary" href="editar.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
			echo '<td><a class="btn btn-danger" href="eliminar.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	include('../footer.php');
?>