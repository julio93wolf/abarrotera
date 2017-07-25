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
				$param['rol']=$value->rol;
				$abarrotera->insertar('rol',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'Se inserto el nuevo rol');
				}else{
					$json=array('mensaje'=>'No se pudo insertar el rol');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_rol'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_rol']=$_GET['id_rol'];
				foreach ($json as $key => $value) {
					$param['rol']=$value->rol;
					$abarrotera->actualizar('rol',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo el rol');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar el rol');
					}
				}
			}else{
				$json=array('mensaje'=>'ID del rol es obligatorío!!!');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_rol'])) {
					$param['id_rol']=$_GET['id_rol'];
					$abarrotera->consultar('select * from usuario_rol where id_rol=:id_rol',$param);
					if ($abarrotera->rowChange==0) {
						$abarrotera->borrar('rol',$param);
						if ($abarrotera->rowChange>0) {
							$json=array('mensaje'=>'Se elimino el rol');
						}else{
							$json=array('mensaje'=>'El rol no existe');
						}
					}else{
						$json=array('mensaje'=>'No se pudo eliminar, el rol tiene '.$abarrotera->rowChange.' dependencias con la tabla usuario');
					}
				}else{
					$json=array('mensaje'=>'ID del rol es obligatorío!!!');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_rol'])) {
					$param['id_rol']=$_GET['id_rol'];
					$json=$abarrotera->consultar('select * from rol where id_rol=:id_rol order by rol',$param);
				}else{
					$json=$abarrotera->consultar('select * from rol order by rol');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'El rol no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>