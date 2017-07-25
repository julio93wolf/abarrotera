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
				$param['proveedor']=$value->proveedor;
				$param['logo']=$value->logo;
				$abarrotera->insertar('proveedor',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'Se inserto el nuevo proveedor');
				}else{
					$json=array('mensaje'=>'No se pudo insertar el proveedor');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_proveedor'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_proveedor']=$_GET['id_proveedor'];
				foreach ($json as $key => $value) {
					$param['proveedor']=$value->proveedor;
					$param['logo']=$value->logo;
					$abarrotera->actualizar('proveedor',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo el proveedor');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar el proveedor');
					}
				}
			}else{
				$json=array('mensaje'=>'ID del proveedor es obligatorío!!!');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_proveedor'])) {
					$param['id_proveedor']=$_GET['id_proveedor'];
					$abarrotera->consultar('select * from marca where id_proveedor=:id_proveedor',$param);
					if ($abarrotera->rowChange==0) {
						$abarrotera->borrar('proveedor',$param);
						if ($abarrotera->rowChange>0) {
							$json=array('mensaje'=>'Se elimino el proveedor');
						}else{
							$json=array('mensaje'=>'El proveedor no existe');
						}
					}else{
						$json=array('mensaje'=>'No se pudo eliminar, el proveedor tiene '.$abarrotera->rowChange.' dependencias con la tabla marca');
					}
				}else{
					$json=array('mensaje'=>'ID del proveedor es obligatorío!!!');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_proveedor'])) {
					$param['id_proveedor']=$_GET['id_proveedor'];
					$json=$abarrotera->consultar('select * from proveedor where id_proveedor=:id_proveedor order by proveedor',$param);
				}else{
					$json=$abarrotera->consultar('select * from proveedor order by proveedor');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'El proveedor no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>