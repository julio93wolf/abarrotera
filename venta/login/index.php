<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['login'])) {
		$correo=$_POST['correo'];
		$contrasena=$_POST['contrasena'];
		if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$contrasena=md5($contrasena);
			$paraLogin['correo']=$correo;
			$paraLogin['contrasena']=$contrasena;
			$datoUsuario=$abarrotera->consultar('select * from usuario where correo=:correo and contrasena=:contrasena',$paraLogin);
			if (count($datoUsuario)>0) {
				$id_usuario=$datoUsuario[0]['id_usuario'];
				$paraRol['id_usuario']=$id_usuario;
				$datoRol=$abarrotera->consultar('select rol from rol join usuario_rol using (id_rol) where id_usuario=:id_usuario',$paraRol);
				$_SESSION['usrValido']=true;
				$_SESSION['usrDatos']=$datoUsuario[0];
				$contRol=0;
				foreach ($datoRol as $keyRol => $valRol) {
					$_SESSION['usrRol'][$contRol]=$datoRol[$contRol]['rol'];
					$contRol++;
				}
				header('Location: ../cliente/index.php');
				die();
			}else{
				$mensaje='Correo o Contraseña incorrecta';
				$color='danger';
				$icon='glyphicon glyphicon-info';
			}
		}else{
			$mensaje='El correo es incorrecto';
			$color='danger';
			$icon='glyphicon glyphicon-info';
		}
	}
	include('../header.php');
?>
<h1>Login</h1>
<form action="index.php" method="POST">
		<div class="form-group">
	    <label for="in_Usuario">Correo</label>
	    <input type="email" name="correo" class="form-control" id="in_Usuario" placeholder="Correo">
  	</div>
  	<div class="form-group">
	    <label for="in_Password">Contraseña</label>
	    <input type="password" required name="contrasena" class="form-control" id="in_Password" placeholder="Contraseña">
  	</div>
	<button type="submit" name="login" value="Login" class="btn btn-primary">Login</button>
</form>

<?php
	include('../footer.php');
?>