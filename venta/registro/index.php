<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		if (isset($_FILES['foto']['name'])) {
			$origen=$_FILES['foto']['tmp_name'];
			$destino='../../image/clientes/'.$_FILES['foto']['name'];
			if($abarrotera->validarImagen($_FILES['foto'])){
				if(move_uploaded_file($origen,$destino)){
					$parametros['correo']=$_POST['correo'];
					$parametros['contrasena']=md5($_POST['contrasena']);
					$abarrotera->insertar('usuario',$parametros);
					$datos=$abarrotera->consultar('select id_usuario from usuario where correo=:correo and contrasena=:contrasena',$parametros);
					$parametros=array();
					$parametros['id_usuario']=$datos[0]['id_usuario'];
					$parametros['nombre']=$_POST['nombre'];
					$parametros['apaterno']=$_POST['apaterno'];
					$parametros['amaterno']=$_POST['amaterno'];
					$parametros['domicilio']=$_POST['domicilio'];
					$parametros['foto']=$_FILES['foto']['name'];
					$abarrotera->insertar('cliente',$parametros);

					$paraUserRol=array();
					$paraUserRol['id_usuario']=$datos[0]['id_usuario'];
					$paraUserRol['id_rol']=1;
					$abarrotera->insertar('usuario_rol',$paraUserRol);

					$mensaje='Se inserto el cliente';
					$color='success';
					$icon='glyphicon glyphicon-ok';
					if($_POST['enviar']=="Guardar y Regresar"){
						include('index.php');
						die();
					}
				}else{
					$mensaje='La foto no se pudo transferir al servidor y el cliente no se dio de alta';
					$color='danger';
					$icon='glyphicon glyphicon-info';
				}
			}else{
				$mensaje='El archivo que intento subir no esta permitido, solo se permiten jpg, png y gif';
				$color='danger';
				$icon='glyphicon glyphicon-info';
			}
		}
	}
	include('../header.php');
?>
<h1>Nuevo Cliente</h1>
<form action="index.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
	    <label for="in_nombre">Nombre</label>
	    <input type="text" name="nombre" class="form-control" id="in_nombre" placeholder="Nombre">
  	</div>
  	<div class="form-group">
	    <label for="in_apaterno">Apellido Paterno</label>
	    <input type="text" name="apaterno" class="form-control" id="in_apaterno" placeholder="Apellido Paterno">
  	</div>
  	<div class="form-group">
	    <label for="in_amaterno">Apellido Materno</label>
	    <input type="text" name="amaterno" class="form-control" id="in_amaterno" placeholder="Apellido Materno">
  	</div>
  	<div class="form-group">
	    <label for="in_domicilio">Domicilio</label>
	    <input type="text" name="domicilio" class="form-control" id="in_domicilio" placeholder="Domicilio">
  	</div>
  	<div class="form-group">
	    <label for="in_foto">Foto</label>
	    <input type="file" name="foto" class="form-control" id="in_foto" placeholder="Foto">
  	</div>
  	<div class="form-group">
	    <label for="in_foto">Correo</label>
	    <input type="email" required name="correo" class="form-control" id="in_foto" placeholder="Correo">
  	</div>
  	<div class="form-group">
	    <label for="in_foto">Contraseña</label>
	    <input type="password" required name="contrasena" class="form-control" id="in_foto" placeholder="Contraseña">
  	</div>
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>