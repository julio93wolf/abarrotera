<?php
	include_once('../abarrotera.class.php');
	if (isset($_REQUEST['id_producto'])) {
		$parametros['id_producto']=$_REQUEST['id_producto'];
		$productos = $abarrotera->dropDownList('select id_producto as id,producto as opcion from producto order by producto asc','id_producto',$parametros['id_producto']);
		$unidad = $abarrotera->dropDownList('select id_unidad_medida as id,unidad_medida as opcion from unidad_medida order by unidad_medida asc','id_unidad_medida');
		if (isset($_REQUEST['enviar'])) {
			$parametros['sku']=$_POST['sku'];
			$parametros['presentacion']=$_POST['presentacion'];
			$parametros['id_unidad_medida']=$_POST['id_unidad_medida'];
			$parametros['preciou']=$_POST['preciou'];
			$parametros['cantidadm']=$_POST['cantidadm'];
			$parametros['preciom']=$_POST['preciom'];
			$abarrotera->insertar('presentacion',$parametros);	
			$mensaje='Se inserto la nueva presentacion';
			$color='success';
			$icon='glyphicon glyphicon-ok';
			if($_REQUEST['enviar']=="Guardar y Regresar"){
				header('Location: /abarrotera/admin/presentacion/index.php?id_producto='.$parametros['id_producto']);
				die();
			}
		}
		include('../header.php');
	}else{
		header('Location: /abarrotera/admin/producto/');
	}
?>
<h1>Nueva Presentación</h1>
<form action="nuevo.php" method="POST">
	<div class="form-group">
	    <label for="in_Productos">Producto</label>
	    <?php
	    	echo $productos;
	    ?>
  </div>
  <input type="hidden" name="id_producto" value="<?php echo $parametros['id_producto']?>">
	<div class="form-group">
		<label for="in_SKU">SKU</label>
		<input type="text" name="sku" class="form-control" id="in_SKU" placeholder="SKU">
  </div>
  <div class="form-group">
		<label for="in_Presentacion">Presentación</label>
		<input type="text" name="presentacion" class="form-control" id="in_Presentacion" placeholder="Presentación">
  </div>
  <div class="form-group">
	    <label for="in_UnidadMedida">Unidad de Medida</label>
	    <?php echo $unidad; ?>
  </div>
  <div class="form-group">
		<label for="in_PrecioUnitario">Precio Unitario</label>
		<input type="text" name="preciou" class="form-control" id="in_PrecioUnitario" placeholder="Precio Unitario">
  </div>
  <div class="form-group">
		<label for="in_CantidadMayoreo">Cantidad Mayoreo</label>
		<input type="text" name="cantidadm" class="form-control" id="in_CantidadMayoreo" placeholder="Cantidad Mayoreo">
  </div>
  <div class="form-group">
		<label for="in_PrecioMayoreo">Precio Mayoreo</label>
		<input type="text" name="preciom" class="form-control" id="in_PrecioMayoreo" placeholder="Precio Mayoreo">
  </div>
  
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>