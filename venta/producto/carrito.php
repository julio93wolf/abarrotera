<?php
	include_once('../abarrotera.class.php');
	$rol[0]='Cliente';
	$abarrotera->guardia($rol);
	if (isset($_POST['solicitar'])) {
		$carrito=array();	
		if (isset($_SESSION['carrito'])) {
			foreach ($_SESSION['carrito'] as $key => $value) {
				$carrito[$key]=$value;
			}
		}
		foreach ($_POST['carrito'] as $key => $value) {
			if(!empty($value)){
				$carrito[$key]['cantidad'] = (isset($carrito[$key])) ? $carrito[$key]['cantidad']+$value : $value;
				$paraProducto['sku']=$key;
				$datoPresentacion=$abarrotera->consultar('select * from vw_productos where sku=:sku',$paraProducto);
				if($value>=$datos[0]['cantidadm']){
					$carrito[$key]['precio_unitario'] = $datos[0]['preciom_descuento'];  
				}
				else{
					$carrito[$key]['precio_unitario'] = $datos[0]['preciou_descuento'];
				}
				$carrito[$key]['descuento_aplicado']=$datoPresentacion[0]['descuento'];
				$carrito[$key]['subtotal']=$carrito[$key]['cantidad'] * $carrito[$key]['precio_unitario'];
			}
		}
		$_SESSION['carrito']=$carrito;
	}
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
?>