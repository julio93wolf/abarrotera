<?php
	include_once('../abarrotera.class.php');
	$id_proveedor = $_GET['id_proveedor'];
	$parametros['id_proveedor']= $id_proveedor;
	$datos=$abarrotera->consultar("select * from marca where id_proveedor= :id_proveedor",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." marcas asociados";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('proveedor',$parametros);	
		$mensaje="Se eliminaron ".$fe." proveedores";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>