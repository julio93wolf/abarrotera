<?php
	include_once('../abarrotera.class.php');
	$id_marca = $_GET['id_marca'];
	$parametros['id_marca']= $id_marca;
	$datos=$abarrotera->consultar("select * from producto where id_marca= :id_marca",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." productos asociados";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('marca',$parametros);	
		$mensaje="Se eliminaron ".$fe." marcas";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>