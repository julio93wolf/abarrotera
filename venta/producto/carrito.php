<?php
	include_once('../abarrotera.class.php');
	$rol[0]='Cliente';
	$abarrotera->guardia($rol);
	if (isset($_GET['accion'])) {
		switch ($_GET['accion']) {
			case 'eliminar':
				$sku=$_GET['sku'];
				unset($_SESSION['carrito'][$sku]);
				break;

			case 'vaciar':
				unset($_SESSION['carrito']);
				break;

			default:
				# code...
				break;
		}
	}
	if (isset($_POST['solicitar']) or isset($_SESSION['carrito'])) {
		$carrito=array();	
		if (isset($_SESSION['carrito'])) {
			foreach ($_SESSION['carrito'] as $key => $value) {
				$carrito[$key]=$value;
			}
		}
		if (isset($_POST['carrito'])) {
			foreach ($_POST['carrito'] as $key => $value) {
				if(!empty($value)){
					$carrito[$key]['cantidad'] = (isset($carrito[$key])) ? $carrito[$key]['cantidad']+$value : $value;
					$paraProducto['sku']=$key;
					$datoPresentacion=$abarrotera->consultar('select * from vw_productos where sku=:sku',$paraProducto);
					if($value>=$datoPresentacion[0]['cantidadm']){
						$carrito[$key]['precio_unitario'] = $datoPresentacion[0]['preciom_descuento'];  
					}
					else{
						$carrito[$key]['precio_unitario'] = $datoPresentacion[0]['preciou_descuento'];
					}
					$carrito[$key]['descuento_aplicado']=$datoPresentacion[0]['descuento'];
					$carrito[$key]['subtotal']=$carrito[$key]['cantidad'] * $carrito[$key]['precio_unitario'];
				}
			}
			$_SESSION['carrito']=$carrito;
		}
	}
	include('../header.php');
?>
	<div class="page-header">
  <h1>Carrito</h1>
	</div>
	<form action="pedido.php" method="POST">
		<table class="table table-hover">
			<tr class="active">
				<th>Cantidad</th>
				<th>SKU</th>
				<th>Precio Unitario</th>
				<th>Descuento Aplicado</th>
				<th>Subtotal</th>
				<th></th>
			</tr>
			<?php
				$total=0;
				foreach ($_SESSION['carrito'] as $key => $value) {
					echo '<tr>';
						echo '<td><input type="text" name="carrito['.$key.']" value="'.$value['cantidad'].'" /></td>';
						echo '<td>'.$key.'</td>';
						echo '<td>'.$value['precio_unitario'].'</td>';
						echo '<td>'.$value['descuento_aplicado'].'</td>';
						echo '<td>$'.$value['subtotal'].'</td>';
						echo '<td><a class="btn btn-danger" href="carrito.php?accion=eliminar&sku='.$key.'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
					$total+=$value['subtotal'];
				}
				echo '<tr class="active">';
				echo '<th></th>';
				echo '<th></th>';
				echo '<th></th>';
				echo '<th></th>';
				echo '<th>Total</th>';
				echo '<th></th>';
				echo '</tr>';
				echo '<td>';
				echo '<th></th>';
				echo '<th></th>';
				echo '<th></th>';
				echo '<th><h3>$'.$total.'</h3></th>';
				echo '</td>';
			?>
		</table>
		<div class="form-group">
	    <button type="submit" name="pedido" value="Comprar" class="btn btn-success">Comprar</button>
	    <a class="btn btn-danger" href="carrito.php?accion=vaciar" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Vaciar Carrito</a>
		</div>
	</form>
<?php
	include('../footer.php');
?>
