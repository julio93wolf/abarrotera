<?php
	include_once('../abarrotera.class.php');
	$id_categoria = $_GET['id_categoria'];
	$parametros['id_categoria']= $id_categoria;
	$datos=$abarrotera->consultar("select * from marca where id_categoria= :id_categoria",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." marcas asociadas";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('categoria',$parametros);	
		$mensaje="Se eliminaron ".$fe." categorias";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>