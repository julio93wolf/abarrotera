<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		$parametros['rol']=$_POST['rol'];
		$abarrotera->insertar('rol',$parametros);	
		$mensaje='Se inserto el nuevo rol';
		$color='success';
		$icon='glyphicon glyphicon-ok';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
		include('../header.php');
?>
<h1>Nuevo Rol</h1>

<form action="nuevo.php" method="POST">
	<div class="form-group">
	    <label for="in_Rol">Rol</label>
	    <input type="text" name="rol" class="form-control" id="in_Rol" placeholder="Rol">
  	</div>
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
</form>

<?php
	
	include('../footer.php');
?>