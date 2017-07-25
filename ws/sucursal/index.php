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
				$param['sucursal']=$value->sucursal;
				$abarrotera->insertar('sucursal',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'Se inserto la nueva sucursal');
				}else{
					$json=array('mensaje'=>'No se pudo insertar la sucursal');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_sucursal'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_sucursal']=$_GET['id_sucursal'];
				foreach ($json as $key => $value) {
					$param['sucursal']=$value->sucursal;
					$abarrotera->actualizar('sucursal',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo la sucursal');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar la sucursal');
					}
				}
			}else{
				$json=array('mensaje'=>'ID de la sucursal es obligatorío!!!');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_sucursal'])) {
					$param['id_sucursal']=$_GET['id_sucursal'];
					$abarrotera->consultar('select * from carrito where id_sucursal=:id_sucursal',$param);
					if ($abarrotera->rowChange==0) {
						$abarrotera->borrar('sucursal',$param);
						if ($abarrotera->rowChange>0) {
							$json=array('mensaje'=>'Se elimino la sucursal');
						}else{
							$json=array('mensaje'=>'La sucursal no existe');
						}
					}else{
						$json=array('mensaje'=>'No se pudo eliminar, la sucursal tiene '.$abarrotera->rowChange.' dependencias con la tabla carrito');
					}
				}else{
					$json=array('mensaje'=>'ID de la sucursal es obligatorío!!!');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_sucursal'])) {
					$param['id_sucursal']=$_GET['id_sucursal'];
					$json=$abarrotera->consultar('select * from sucursal where id_sucursal=:id_sucursal order by sucursal',$param);
				}else{
					$json=$abarrotera->consultar('select * from sucursal order by sucursal');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'La sucursal no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>