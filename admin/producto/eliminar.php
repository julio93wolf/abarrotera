<?php
	include_once('../abarrotera.class.php');
	$id_producto = $_GET['id_producto'];
	$parametros['id_producto']= $id_producto;
	$datos=$abarrotera->consultar("select * from presentacion where id_producto= :id_producto",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." presentaciones asociados";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('producto',$parametros);	
		$mensaje="Se eliminaron ".$fe." productos";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>