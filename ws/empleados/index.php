<?php
	include('../../admin/abarrotera.class.php');
	$metodo=$_SERVER['REQUEST_METHOD'];
	header('Content-Type: application/json');	
	$json=array('mensaje'=>'no se implemento ninguna acción');
	switch ($metodo) {
		case 'POST':
			$json=file_get_contents('php://input');
			$json=json_decode($json);
			foreach ($json as $key => $value) {
				$param['id_usuario']=$value->id_usuario;
				$param['nombre']=$value->nombre;
				$param['apaterno']=$value->apaterno;
				$param['amaterno']=$value->amaterno;
				$abarrotera->insertar('empleado',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'Se Inserto el empleado');
				}else{
					$json=array('mensaje'=>'No se pudo insertar el empleado');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_empleado'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_empleado']=$_GET['id_empleado'];
				foreach ($json as $key => $value) {
					$param['id_usuario']=$value->id_usuario;
					$param['nombre']=$value->nombre;
					$param['apaterno']=$value->apaterno;
					$param['amaterno']=$value->amaterno;
					$abarrotera->actualizar('empleado',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo el empleado');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar el empleado');
					}
				}
			}else{
				$json=array('mensaje'=>'ID del Empleado Obligatorío');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_empleado'])) {
					$param['id_empleado']=$_GET['id_empleado'];
					$abarrotera->borrar('empleado',$param);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se elimino el empleado');
					}else{
						$json=array('mensaje'=>'El empleado no existe');
					}
				}else{
					$json=array('mensaje'=>'ID del Empleado Obligatorío');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_empleado'])) {
					$param['id_empleado']=$_GET['id_empleado'];
					$json=$abarrotera->consultar('select * from empleado where id_empleado=:id_empleado order by id_empleado',$param);
				}else{
					$json=$abarrotera->consultar('select * from empleado order by id_empleado');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'El empleado no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>