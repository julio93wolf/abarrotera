<?php
	include_once('../abarrotera.class.php');
	$rol[0]='Cliente';
	$abarrotera->guardia($rol);
	include('../header.php');
	$datos=$abarrotera->consultar("select * from producto pro join marca mar on pro.id_marca=mar.id_marca order by pro.producto asc");
?>
	<table class="table table-hover">
		<tr>
			<th>Producto</th>
			<th>Marca</th>
			<th>Presentaciones</th>
		</tr>
		<?php
			foreach ($datos as $key => $value) {
				echo '<tr>';
					echo '<td>'.$value['producto'].'</td>';
					echo '<td>'.$value['marca'].'</td>';
					echo '<td><a class="btn btn-success" href="../presentacion/index.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ver Presentaciones</a></td>';
				echo '</tr>';
			}
		?>
	</table>
<?php
	include('../footer.php');
?>