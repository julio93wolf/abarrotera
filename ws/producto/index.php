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
				$param['producto']=$value->producto;
				$param['id_marca']=$value->id_marca;
				$abarrotera->insertar('producto',$param);
				if ($abarrotera->rowChange>0) {
					$json=array('mensaje'=>'Se inserto el nuevo producto');
				}else{
					$json=array('mensaje'=>'No se pudo insertar el producto');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_producto'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_producto']=$_GET['id_producto'];
				foreach ($json as $key => $value) {
					$param['producto']=$value->producto;
					$param['id_marca']=$value->id_marca;
					$abarrotera->actualizar('producto',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$json=array('mensaje'=>'Se actualizo el producto');
					}else{
						$json=array('mensaje'=>'No se pudo actualizar el producto');
					}
				}
			}else{
				$json=array('mensaje'=>'ID de la producto es obligatorío!!!');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_producto'])) {
					$param['id_producto']=$_GET['id_producto'];					
					$abarrotera->consultar('select * from presentacion where id_producto=:id_producto',$param);
					if ($abarrotera->rowChange==0) {
						$abarrotera->borrar('producto',$param);
						if ($abarrotera->rowChange>0) {
							$json=array('mensaje'=>'Se elimino la producto');
						}else{
							$json=array('mensaje'=>'La producto no existe');
						}
					}else{
						$json=array('mensaje'=>'No se pudo eliminar, el producto tiene '.$abarrotera->rowChange.' dependencias con la tabla presentacion');
					}
				}else{
					$json=array('mensaje'=>'ID de la producto es obligatorío!!!');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_producto'])) {
					$param['id_producto']=$_GET['id_producto'];
					$json=$abarrotera->consultar('select * from producto where id_producto=:id_producto order by producto',$param);
				}else{
					$json=$abarrotera->consultar('select * from producto order by producto');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'El producto no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>