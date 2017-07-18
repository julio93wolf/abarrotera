<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		$parametros['unidad_medida']=$_POST['unidad_medida'];
		$abarrotera->insertar('unidad_medida',$parametros);	
		$mensaje='Se inserto la unida de medida';
		$color='success';
		$icon='glyphicon glyphicon-ok';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	include('../header.php');
?>
<h1>Nueva Unidad de Medida</h1>

<form action="nuevo.php" method="POST">
	<div class="form-group">
	    <label for="in_UnidadMedida">Unidad de Medida</label>
	    <input type="text" name="unidad_medida" class="form-control" id="in_UnidadMedida" placeholder="Unidad de Medida">
  	</div>
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>