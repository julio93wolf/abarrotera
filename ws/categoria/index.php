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
				$param['categoria']=$value->categoria;
				$abarrotera->insertar('categoria',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'Se inserto la nueva categoria');
				}else{
					$json=array('mensaje'=>'No se pudo insertar la categoria');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_categoria'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_categoria']=$_GET['id_categoria'];
				foreach ($json as $key => $value) {
					$param['categoria']=$value->categoria;
					$abarrotera->actualizar('categoria',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo la categoría');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar la categoría');
					}
				}
			}else{
				$json=array('mensaje'=>'ID de la categoría es obligatorío!!!');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_categoria'])) {
					$param['id_categoria']=$_GET['id_categoria'];
					$abarrotera->borrar('categoria',$param);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se elimino la categoría');
					}else{
						$json=array('mensaje'=>'La categoría no existe');
					}
				}else{
					$json=array('mensaje'=>'ID de la categoría es obligatorío!!!');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_categoria'])) {
					$param['id_categoria']=$_GET['id_categoria'];
					$json=$abarrotera->consultar('select * from categoria where id_categoria=:id_categoria order by categoria',$param);
				}else{
					$json=$abarrotera->consultar('select * from categoria order by categoria');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'La categoría no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>