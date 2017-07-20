<?php
	include_once('../abarrotera.class.php');
	if (isset($_REQUEST['llave'])) {
		$paraLlave['llave']=$_REQUEST['llave'];
		$datoUsuario=$abarrotera->consultar('select * from usuario where llave=:llave',$paraLlave);
		if (count($datoUsuario)>0 && strlen($datoUsuario[0]['llave'])>0) {
			if (isset($_POST['enviar'])) {
				$llaveUsuario['llave']=$_POST['llave'];
				$paraUsuario['contrasena']=md5($_POST['contrasena']);
				$paraUsuario['llave']='';
				$abarrotera->actualizar('usuario',$paraUsuario,$llaveUsuario);
				header('Location: /abarrotera/venta/login/index.php');
			}
		}else{
			header('Location: /abarrotera/venta/login/index.php');
		}
	}
	include('../header.php');
?>
<h1>Login</h1>
<form action="reestablecer.php" method="POST">
		<div class="form-group">
	    <label for="in_Password">Escriba la nueva contraseña</label>
	    <input type="password" name="contrasena" class="form-control" id="in_Password" placeholder="Contraseña">
	    <input type="hidden" name="llave" class="form-control" id="in_Llave" value="<?php echo $_REQUEST['llave']; ?>">
  	</div>
  	<div class="form-group">
	    <button type="submit" name="enviar" value="Enviar" class="btn btn-success">Enviar</button>
  	</div>
</form>
<?php
	include('../footer.php');
?>
