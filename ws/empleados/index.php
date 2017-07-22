<?php
	include('../../admin/abarrotera.class.php');
	$medoto=$_SERVER['REQUEST_METHOD'];
	header('Content-Type: application/json');	
	$json=array('mensaje'=>'no se implemento ninguna acción');
	json_encode($json);
	switch ($medoto) {
		case 'POST':
			# Insertar
			break;
		case 'PUT':
			# Actualizar
			break;
		case 'DELETE':
			# Eliminar
			break;
		default:
			case 'GET':
				$datos=$abarrotera->consultar('select * from empleado');
				if (isset($_GET['id'])) {
					$param['id_empleado']=$_GET['id'];
					$datos2=$abarrotera->consultar('select * from empleado where id_empleado=:id_empleado',$param);
				}
				$json=json_encode($datos);
			break;
	}
	echo $json;
?>