<?php
	include_once('../abarrotera.class.php');
	$rol[0]='Cliente';
	$abarrotera->guardia($rol);
	if (isset($_POST['pedido'])) {
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
		}
		$paraCliente['id_usuario']=$_SESSION['usrDatos']['id_usuario'];
		$datoCliente=$abarrotera->consultar('select id_cliente from cliente where id_usuario=:id_usuario',$paraCliente);
		$paraCarrito['id_cliente']=$datoCliente[0]['id_cliente'];
		$paraCarrito['id_empleado']=3;
		$paraCarrito['id_sucursal']=6;
		$paraCarrito['fecha']=date('Y-m-d');
		$abarrotera->insertar('carrito',$paraCarrito);
		$paraCarrito=array();
		$paraCarrito['id_cliente']=$datoCliente[0]['id_cliente'];
		$datoCarrito=$abarrotera->consultar('select id_carrito from carrito where id_cliente=:id_cliente order by id_carrito desc limit 1',$paraCarrito);
		$paraDetalle['id_carrito']=$datoCarrito[0]['id_carrito'];
		foreach ($carrito as $key => $value) {
			$paraDetalle['sku']=$key;
			$paraDetalle['cantidad']=$value['cantidad'];
			$paraDetalle['precio_unitario']=$value['precio_unitario'];
			$paraDetalle['descuento_aplicado']=$value['descuento_aplicado'];
			$abarrotera->insertar('carrito_detalle',$paraDetalle);
		}
		$mensaje="Gracias por su compra";
		$color="success";
		$icon='glyphicon glyphicon-info';
		unset($_SESSION['carrito']);
	}else{
		header('Location: index.php');
	}
	include('../header.php');
?>
<?php
	include('../footer.php');
?>