<?php
	include_once('../abarrotera.class.php');
	include('../header.php');
	$datos=$abarrotera->consultar("select * from producto pro join marca mar on pro.id_marca=mar.id_marca order by pro.producto asc");
?>
	<a class="btn btn-success" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>
	<table class="table table-hover">
		<tr>
			<th>Producto</th>
				<th>Marca</th>
				<th>Editar</th>
				<th>Eliminar</th>
				<th>
			</th>
		</tr>
		<?php
			foreach ($datos as $key => $value) {
				echo '<tr>';
					echo '<td>'.$value['producto'].'</td>';
					echo '<td>'.$value['marca'].'</td>';
					echo '<td><a class="btn btn-success" href="../presentacion/index.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ver Presentaciones</a></td>';
					echo '<td><a class="btn btn-primary" href="editar.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
					echo '<td><a class="btn btn-danger" href="eliminar.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
				echo '</tr>';
			}
		?>
	</table>
<?php
	include('../footer.php');
?>