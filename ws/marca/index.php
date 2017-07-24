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
				$param['marca']=$value->marca;
				$param['id_proveedor']=$value->id_proveedor;
				$param['id_categoria']=$value->id_categoria;
				$abarrotera->insertar('marca',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'Se inserto la nueva marca');
				}else{
					$json=array('mensaje'=>'No se pudo insertar la marca');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_marca'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_marca']=$_GET['id_marca'];
				foreach ($json as $key => $value) {
					$param['marca']=$value->marca;
					$param['id_proveedor']=$value->id_proveedor;
					$param['id_categoria']=$value->id_categoria;
					$abarrotera->actualizar('marca',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo la marca');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar la marca');
					}
				}
			}else{
				$json=array('mensaje'=>'ID de la marca es obligatorío!!!');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_marca'])) {
					$param['id_marca']=$_GET['id_marca'];
					$abarrotera->borrar('marca',$param);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se elimino la marca');
					}else{
						$json=array('mensaje'=>'La marca no existe');
					}
				}else{
					$json=array('mensaje'=>'ID de la marca es obligatorío!!!');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_marca'])) {
					$param['id_marca']=$_GET['id_marca'];
					$json=$abarrotera->consultar('select * from marca where id_marca=:id_marca order by marca',$param);
				}else{
					$json=$abarrotera->consultar('select * from marca order by marca');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'El marca no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>