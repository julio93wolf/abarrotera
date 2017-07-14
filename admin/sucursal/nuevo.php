<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		$parametros['sucursal']=$_POST['sucursal'];
		$abarrotera->insertar('sucursal',$parametros);	
		$mensaje='Se inserto una nueva sucursal';
		$color='success';
		$icon='glyphicon glyphicon-ok';
	}
	include('../header.php');
?>
<h1>Nueva sucursal</h1>

<form action="nuevo.php" method="POST">
	<div class="form-group">
	    <label for="in_Sucursal">Sucursal</label>
	    <input type="text" name="sucursal" class="form-control" id="in_Sucursal" placeholder="Sucursal">
  	</div>
	<button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" class="btn btn-primary">Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>