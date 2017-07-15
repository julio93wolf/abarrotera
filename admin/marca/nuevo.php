<?php
	include_once('../abarrotera.class.php');
	$proveedores = $abarrotera->dropDownList('select id_proveedor as id,proveedor as opcion from proveedor order by proveedor asc','id_proveedor');

	$categoria = $abarrotera->dropDownList('select id_categoria as id,categoria as opcion from categoria order by categoria asc','id_categoria');

	if (isset($_POST['enviar'])) {
		if (isset($_POST['enviar'])) {
			$parametros['marca']=$_POST['marca'];
			$parametros['id_proveedor']=$_POST['id_proveedor'];
			$parametros['id_categoria']=$_POST['id_categoria'];
			$abarrotera->insertar('marca',$parametros);	
			$mensaje='Se inserto la nueva marca';
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
<h1>Nueva Categoria</h1>
<form action="nuevo.php" method="POST">
	<div class="form-group">
	    <label for="in_Marca">Marca</label>
	    <input type="text" name="marca" class="form-control" id="in_Marca" placeholder="Marca">
  </div>
  <div class="form-group">
	    <label for="in_Categoria">Proveedor</label>
	    <?php
	    	echo $proveedores;
	    ?>
  </div>
  <div class="form-group">
	    <label for="in_Categoria">Categoria</label>
	    <?php
	    	echo $categoria;
	    ?>
  </div>
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>