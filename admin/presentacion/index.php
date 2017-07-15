<?php
	include_once('../abarrotera.class.php');
	include('../header.php');
	$where='';
	if(isset($_REQUEST['id_producto'])){
		$where=' where pre.id_producto=:id_producto';
		$parametros['id_producto']=$_REQUEST['id_producto'];
	}else{
		header('Location: /abarrotera/admin/producto/');
	}
	$datos=$abarrotera->consultar("select pre.sku,pro.producto,pre.presentacion,ume.unidad_medida,pre.preciou,pre.cantidadm,pre.preciom from presentacion pre join producto pro on pre.id_producto = pro.id_producto join unidad_medida ume on pre.id_unidad_medida = ume.id_unidad_medida".$where,$parametros);

	echo '<a class="btn btn-success" href="nuevo.php?id_producto='.$parametros['id_producto'].'" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>';
?>
<table class="table table-hover">
	<tr>
		<th>SKU</th>
		<th>Producto</th>
		<th>Presentacion</th>
		<th>Unidad de Medida</th>
		<th>Precio Unitario</th>
		<th>Cantidad Mayore</th>
		<th>Precio Mayoreo</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>';
	<?php
	foreach ($datos as $key => $value) {
		echo '<tr>';
			echo '<td>'.$value['sku'].'</td>';
			echo '<td>'.$value['producto'].'</td>';
			echo '<td>'.$value['presentacion'].'</td>';
			echo '<td>'.$value['unidad_medida'].'</td>';
			echo '<td>'.$value['preciou'].'</td>';
			echo '<td>'.$value['cantidadm'].'</td>';
			echo '<td>'.$value['preciom'].'</td>';
			echo '<td><a class="btn btn-primary" href="editar.php?sku='.$value['sku'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
			echo '<td><a class="btn btn-danger" href="eliminar.php?sku='.$value['sku'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
		echo '</tr>';
	}?>
	</table>
<?php
	include('../footer.php');
?>
