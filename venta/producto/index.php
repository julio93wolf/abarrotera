<?php
	include_once('../abarrotera.class.php');
	$rol[0]='Cliente';
	$abarrotera->guardia($rol);
	include('../header.php');
	$datoProducto=$abarrotera->consultar("select * from vw_productos");
?>
	<form action="carrito.php" method="POST">
	<table class="table table-hover">
		<tr class="active">
			<th>Cantidad</th>
			<th></th>
			<th>SKU</th>
			<th>Producto</th>
			<th>Presentacion</th>
			<th>Unidad de Medida</th>
			<th>Precio Unitario</th>
			<th>Cantidad de Mayoreo</th>
			<th>Precio Matoreo</th>
		</tr>
		<?php
			foreach ($datoProducto as $key => $value) {
				echo '<tr>';
					echo '<td><input type="text" name="carrito['.$value['sku'].']" /></td>';
					echo '<td><img src="../../image/presentaciones/'.$value['imagen'].'" class="img-responsive center-block" alt="'.$value['sku'].'" /></td>';
					echo '<td>'.$value['sku'].'</td>';
					echo '<td>'.$value['producto'].'</td>';
					echo '<td>'.$value['presentacion'].'</td>';
					echo '<td>'.$value['unidad_medida'].'</td>';
					echo '<td>'.$value['preciou'].'</td>';
					echo '<td>'.$value['cantidadm'].'</td>';
					echo '<td>'.$value['preciom'].'</td>';

				echo '</tr>';
			}
		?>
	</table>
	<div class="form-group">
    <button type="submit" name="solicitar" value="Solicitar" class="btn btn-primary">Solicitar</button>
	</div>
	</form>
<?php
	include('../footer.php');
?>