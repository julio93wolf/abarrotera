<?php
	include('../abarrotera.class.php');
	$parametros['id_unidad_medida']=1;
	$parametros['unidad_medida']='gramos';
	$abarrotera->borrar('unidad_medida',$parametros);
?>