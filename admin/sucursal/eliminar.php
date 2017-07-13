<?php
	include_once('../abarrotera.class.php');
	$id_sucursal = $_GET['id_sucursal'];
	$parametros['id_sucursal']= $id_sucursal;
	$datos=$abarrotera->consultar("select * from carrito where id_sucursal= :id_sucursal",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." ventas asociadas";
	$color="danger";
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('sucursal',$parametros);	
		$mensaje="Se eliminaron ".$fe." sucursales";
		$color="success";
	}
	include('index.php');
?>