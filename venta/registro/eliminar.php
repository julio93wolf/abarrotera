<?php
	include_once('../abarrotera.class.php');
	$id_cliente = $_GET['id_cliente'];
	$parametros['id_cliente']= $id_cliente;
	$datos1=$abarrotera->consultar("select * from carrito where id_cliente= :id_cliente",$parametros);
	$datos2=$abarrotera->consultar("select * from comentario where id_cliente= :id_cliente",$parametros);
	$mensaje='';
	if($datos1>0){
		$mensaje.="No se han podido eliminar por que hay ".sizeof($datos1)." ventas asociadas ";	
	}
	if($datos2>0){
		$mensaje.="No se han podido eliminar por que hay ".sizeof($datos2)." comentarios asociados ";	
	}
	$icon='glyphicon-exclamation-sign';
	$color="danger";
	if(sizeof($datos1)<=0 && sizeof($datos2)<=0){
		$fe=$abarrotera->borrar('cliente',$parametros);	
		$mensaje="Se eliminaron ".$fe." clientes";
		$color="success";
		$icon='glyphicon glyphicon-ok';
	}
	include('index.php');
?>