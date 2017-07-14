<?php
	include_once('../abarrotera.class.php');
	$id_rol = $_GET['id_rol'];
	$parametros['id_rol']= $id_rol;
	$datos=$abarrotera->consultar("select * from usuario_rol where id_rol= :id_rol",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." usuarios asociados";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('rol',$parametros);	
		$mensaje="Se eliminaron ".$fe." roles";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>