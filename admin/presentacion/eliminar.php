<?php
	include_once('../abarrotera.class.php');
	$sku = $_GET['sku'];
	$parametros['sku']= $sku;
	$datos1=$abarrotera->consultar("select * from promocion_producto where sku= :sku",$parametros);
	$datos2=$abarrotera->consultar("select * from carrito_detalle where sku= :sku",$parametros);
	$mensaje='';
	if($datos1!=null){
		$mensaje.="No se han podido eliminar por que hay ".sizeof($datos1)." promociones asociadas ";	
	}
	if($datos2!=null){
		$mensaje.="No se han podido eliminar por que hay ".sizeof($datos2)." compras asociadas ";	
	}
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos1)<=0&&sizeof($datos2)<=0){
		$fe=$abarrotera->borrar('presentacion',$parametros);	
		$mensaje="Se eliminaron ".$fe." marcas";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>