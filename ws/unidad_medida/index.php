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
				$param['unidad_medida']=$value->unidad_medida;
				$abarrotera->insertar('unidad_medida',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'La unidad de medida se inserto');
				}else{
					$json=array('mensaje'=>'No se pudo insertar la unidad de medida');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_unidad_medida'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_unidad_medida']=$_GET['id_unidad_medida'];
				foreach ($json as $key => $value) {
					$param['unidad_medida']=$value->unidad_medida;
					$abarrotera->actualizar('unidad_medida',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo la unidad de medida');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar la unidad de medida');
					}
				}
			}else{
				$json=array('mensaje'=>'ID de la unida de de medida es obligatorío!!!');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_unidad_medida'])) {
					$param['id_unidad_medida']=$_GET['id_unidad_medida'];
					$abarrotera->borrar('unidad_medida',$param);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se elimino la unidad de medida');
					}else{
						$json=array('mensaje'=>'La unidad de medida no existe');
					}
				}else{
					$json=array('mensaje'=>'ID de la unida de de medida es obligatorío!!!');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_unidad_medida'])) {
					$param['id_unidad_medida']=$_GET['id_unidad_medida'];
					$json=$abarrotera->consultar('select * from unidad_medida where id_unidad_medida=:id_unidad_medida order by unidad_medida',$param);
				}else{
					$json=$abarrotera->consultar('select * from unidad_medida order by unidad_medida');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'La unidad_medida no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>