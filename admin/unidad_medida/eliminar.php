<?php
	include_once('../abarrotera.class.php');
	$id_unidad_medida = $_GET['id_unidad_medida'];
	$parametros['id_unidad_medida']= $id_unidad_medida;
	$datos=$abarrotera->consultar("select * from presentacion where id_unidad_medida= :id_unidad_medida",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." productos asociados";
	$color="danger";
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('unidad_medida',$parametros);	
		$mensaje="Se eliminaron ".$fe." unidades de medida";
		$color="success";
	}
	include('index.php');
?>