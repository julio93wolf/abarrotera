<?php
	include_once('../abarrotera.class.php');
	include('../header.php');
	$datos=$abarrotera->consultar("select * from marca mar join proveedor pro on mar.id_proveedor=pro.id_proveedor join categoria cat on mar.id_categoria=cat.id_categoria order by mar.marca asc");

	echo '<a class="btn btn-success" href="#" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>';
	echo '<table class="table table-hover">';
	echo '<tr>';
	echo '<th>Marca</th>';
	echo '<th>Proveedor</th>';
	echo '<th>Categoria</th>';
	echo '<th>Editar</th>';
	echo '<th>Eliminar</th>';
	echo '</tr>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
			echo '<td>'.$value['marca'].'</td>';
			echo '<td>'.$value['proveedor'].'</td>';
			echo '<td>'.$value['categoria'].'</td>';
			echo '<td><a class="btn btn-primary" href="editar.php?id_marca='.$value['id_marca'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
			echo '<td><a class="btn btn-danger" href="eliminar.php?id_marca='.$value['id_marca'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	include('../footer.php');
?>