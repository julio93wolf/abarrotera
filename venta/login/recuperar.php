<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		$correo=$_POST['correo'];
		$paraCorreo['correo']=$correo;
		$datoCorreo=$abarrotera->consultar('select * from usuario  where correo=:correo',$paraCorreo);
		if (count($datoCorreo)>0) {
			$token=md5(rand(1,1000000).sha1($correo)).md5(md5($datoCorreo[0]['contrasena'])).md5(rand(1,1000000).soundex(crypt('abarrotera','correo')).crypt('prograweb','verano'));
			echo $token;
			die();
		}
	}
	include('../header.php');
?>
<h1>Login</h1>
<form action="recuperar.php" method="POST">
		<div class="form-group">
	    <label for="in_Correo">Correo</label>
	    <input type="email" name="correo" class="form-control" id="in_Correo" placeholder="Correo">
  	</div>
  	<div class="form-group">
	    <button type="submit" name="enviar" value="Enviar" class="btn btn-success">Enviar</button>
  	</div>
</form>
<?php
	include('../footer.php');
?>