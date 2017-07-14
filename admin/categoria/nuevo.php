<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		$parametros['categoria']=$_POST['categoria'];
		$abarrotera->insertar('categoria',$parametros);	
		$mensaje='Se inserto la nueva categoria';
		$color='success';
		$icon='glyphicon glyphicon-ok';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
		include('../header.php');
?>
<h1>Nueva Categoria</h1>

<form action="nuevo.php" method="POST">
	<div class="form-group">
	    <label for="in_Categoria">Categoria</label>
	    <input type="text" name="categoria" class="form-control" id="in_Categoria" placeholder="Categoria">
  	</div>
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>