<?php
	include_once('../abarrotera.class.php');
	$id_empleado = $_GET['id_empleado'];
	$parametros['id_empleado']= $id_empleado;
	$datos=$abarrotera->consultar("select * from carrito where id_empleado= :id_empleado",$parametros);
	$mensaje="No se han podido eliminar por que hay ".sizeof($datos)." ventas asociadas";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$fe=$abarrotera->borrar('empleado',$parametros);	
		$mensaje="Se eliminaron ".$fe." empleados";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>