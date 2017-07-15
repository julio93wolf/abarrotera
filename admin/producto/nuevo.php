<?php
	include_once('../abarrotera.class.php');
	$marca = $abarrotera->dropDownList('select id_marca as id,marca as opcion from marca order by marca asc','id_marca');

	if (isset($_POST['enviar'])) {
		if (isset($_POST['enviar'])) {
			$parametros['id_marca']=$_POST['id_marca'];
			$parametros['producto']=$_POST['producto'];
			$abarrotera->insertar('producto',$parametros);	
			$mensaje='Se inserto el nuevo producto';
			$color='success';
			$icon='glyphicon glyphicon-ok';
			if($_POST['enviar']=="Guardar y Regresar"){
				include('index.php');
				die();
			}
		}
	}
	include('../header.php');
?>
<h1>Nuevo Producto</h1>
<form action="nuevo.php" method="POST">
	<div class="form-group">
	    <label for="in_Marca">Marca</label>
	    <?php
	    	echo $marca;
	    ?>
  </div>
	<div class="form-group">
		<label for="in_Producto">Producto</label>
		<input type="text" name="producto" class="form-control" id="in_Producto" placeholder="Producto">
  </div>
  
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>