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
				$param['correo']=$value->correo;
				$param['contrasena']=$value->contrasena;
				$abarrotera->insertar('usuario',$param);
				$dato=$abarrotera->consultar('select id_usuario from usuario where correo=:correo and contrasena=:contrasena',$param);
				if ($abarrotera->rowChange>0) {
					$param=array();
					$param['id_usuario']=$dato[0]['id_usuario'];
					$param['nombre']=$value->nombre;
					$param['apaterno']=$value->apaterno;
					$param['amaterno']=$value->amaterno;
					$abarrotera->insertar('empleado',$param);
					if ($abarrotera->rowChange>0) {
						$param=array();
						$param['id_usuario']=$dato[0]['id_usuario'];
						$param['id_rol']=2;
						$abarrotera->insertar('usuario_rol',$param);
						if ($abarrotera->rowChange>0) {
							$json=array('mensaje'=>'Se inserto el empleado');	
						}else{
							$json=array('mensaje'=>'No se inserto rol del empleado');
						}
					}else{
						$json=array('mensaje'=>'No se inserto el empleado');
					}
				}else{
					$json=array('mensaje'=>'No se inserto el usuario');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_empleado'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_empleado']=$_GET['id_empleado'];
				foreach ($json as $key => $value) {
					$param['nombre']=$value->nombre;
					$param['apaterno']=$value->apaterno;
					$param['amaterno']=$value->amaterno;
					$abarrotera->actualizar('empleado',$param,$llave);
					if ($abarrotera->rowChange>0) {
						$param=array();
						$param['id_empleado']=$_GET['id_empleado'];
						$dato=$abarrotera->consultar('select id_usuario from empleado where id_empleado=:id_empleado',$param);
						$llave=array();
						$llave['id_usuario']=$dato[0]['id_usuario'];
						$param=array();
						$param['correo']=$value->correo;
						$param['contrasena']=$value->contrasena;
						$abarrotera->actualizar('usuario',$param,$llave);
						if ($abarrotera->rowChange>0) {
							$json=array('mensaje'=>'Se actualizaron los datos del empleado');
						}else{
							$json=array('mensaje'=>'No se actualizaron los datos del usuario');
						}
					}else{
						$json=array('mensaje'=>'No se actualizaron los datos del empleado o el empleado no existe');
					}
				}
			}else{
				$json=array('mensaje'=>'El ID del Empleado es Obligatorío');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_empleado'])) {
					$param['id_empleado']=$_GET['id_empleado'];
					$abarrotera->consultar('select * from carrito where id_empleado=:id_empleado',$param);
					if ($abarrotera->rowChange==0) {
						$dato=$abarrotera->consultar('select id_usuario from empleado where id_empleado=:id_empleado',$param);
						if ($abarrotera->rowChange>0) {
							$abarrotera->borrar('empleado',$param);
							if ($abarrotera->rowChange>0) {
								$param=array();
								$param['id_usuario']=$dato[0]['id_usuario'];
								$abarrotera->borrar('usuario_rol',$param);
								if ($abarrotera->rowChange>0) {	
									$abarrotera->borrar('usuario',$param);
									if ($abarrotera->rowChange>0){
										$json=array('mensaje'=>'Se elimino el empleado');	
									}else{
										$json=array('mensaje'=>'No se elimino el usuario');	
									}
								}else{
									$json=array('mensaje'=>'No se elimino el rol del empleado');	
								}
							}else{
								$json=array('mensaje'=>'No se elimino el empleado');	
							}
						}else{
							$json=array('mensaje'=>'El empleado no existe');
						}					
					}else{
						$json=array('mensaje'=>'No se puede eliminar, existen '.$abarrotera->rowChange.' dependencias en la tabla carrito');
					}
				}else{
					$json=array('mensaje'=>'El ID del empleado es obligatorío');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_empleado'])) {
					$param['id_empleado']=$_GET['id_empleado'];
					$json=$abarrotera->consultar('select id_empleado,correo,apaterno,amaterno,nombre,rol from empleado join usuario using (id_usuario) join usuario_rol using (id_usuario) join rol using (id_rol) where id_empleado=:id_empleado order by id_empleado',$param);
				}else{
					$json=$abarrotera->consultar('select id_empleado,correo,apaterno,amaterno,nombre,rol from empleado join usuario using (id_usuario) join usuario_rol using (id_usuario) join rol using (id_rol) order by id_empleado');
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