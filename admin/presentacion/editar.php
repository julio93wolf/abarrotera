<?php
	include_once('../abarrotera.class.php');
	if(isset($_REQUEST['sku_ant'])){
		$sku['sku']=$_REQUEST['sku_ant'];
		$datos=$abarrotera->consultar("select * from presentacion where sku=:sku",$sku);
		$unidad = $abarrotera->dropDownList('select id_unidad_medida as id,unidad_medida as opcion from unidad_medida order by unidad_medida asc','id_unidad_medida',$datos[0]['id_unidad_medida']);
	}else{
		header('Location: /abarrotera/admin/producto/');
	}
	if (isset($_POST['enviar'])) {
		$llaves['sku']=$_POST['sku_ant'];
		if(!empty($_FILES['imagen']['name'])){
			$extension=explode('.',$_FILES['imagen']['name']);
			$origen=$_FILES['imagen']['tmp_name'];
			$destino='../../image/presentaciones/'.$sku['sku'].'.'.$extension[count(-1)];
			if($abarrotera->validarImagen($_FILES['imagen'])){
				if(move_uploaded_file($origen,$destino)){
					$parametros['id_producto']=$_POST['id_producto'];
					$parametros['sku']=$_POST['sku'];
					$parametros['presentacion']=$_POST['presentacion'];
					$parametros['id_unidad_medida']=$_POST['id_unidad_medida'];
					$parametros['preciou']=$_POST['preciou'];
					$parametros['cantidadm']=$_POST['cantidadm'];
					$parametros['preciom']=$_POST['preciom'];
					$parametros['imagen']=$sku['sku'].'.'.$extension[count(-1)];
					$abarrotera->actualizar('presentacion',$parametros,$llaves);	
					$mensaje='Se actualizo la presentacion';
					$color='success';
					$icon='glyphicon glyphicon-ok';
				}else{
					$mensaje='El logotipo no se pudo transferir al servidor y el proveedor no se dio de alta';
					$color='danger';
					$icon='glyphicon glyphicon-info';
				}
			}else{
				$mensaje='El archivo que intento subir no esta permitido, solo se permiten jpg, png y gif';
				$color='danger';
				$icon='glyphicon glyphicon-info';		
			}
		}else{
			$parametros['sku']=$_POST['sku'];
			$parametros['presentacion']=$_POST['presentacion'];
			$parametros['id_unidad_medida']=$_POST['id_unidad_medida'];
			$parametros['preciou']=$_POST['preciou'];
			$parametros['cantidadm']=$_POST['cantidadm'];
			$parametros['preciom']=$_POST['preciom'];
			$abarrotera->actualizar('presentacion',$parametros,$llaves);	
			$mensaje='Se actualizo la nueva presentacion';
			$color='success';
			$icon='glyphicon glyphicon-ok';
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	include('../header.php');
?>
<h1>Editar Presentación</h1>
<form action="editar.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="in_SKU">SKU</label>
		<input type="text" name="sku" class="form-control" id="in_SKU" placeholder="SKU" value="<?php echo $datos[0]['sku']; ?>">
  </div>
  <div class="form-group">
		<label for="in_Presentacion">Presentación</label>
		<input type="text" name="presentacion" class="form-control" id="in_Presentacion" placeholder="Presentación" value="<?php echo $datos[0]['presentacion']; ?>">
  </div>
  <div class="form-group">
	    <label for="in_UnidadMedida">Unidad de Medida</label>
	    <?php
	    	echo $unidad;
	    ?>
  </div>
  <div class="form-group">
		<label for="in_PrecioUnitario">Precio Unitario</label>
		<input type="text" name="preciou" class="form-control" id="in_PrecioUnitario" placeholder="Precio Unitario" value="<?php echo $datos[0]['preciou']; ?>">
  </div>
  <div class="form-group">
		<label for="in_CantidadMayoreo">Cantidad Mayoreo</label>
		<input type="text" name="cantidadm" class="form-control" id="in_CantidadMayoreo" placeholder="Cantidad Mayoreo" value="<?php echo $datos[0]['cantidadm']; ?>">
  </div>
  <div class="form-group">
		<label for="in_PrecioMayoreo">Precio Mayoreo</label>
		<input type="text" name="preciom" class="form-control" id="in_PrecioMayoreo" placeholder="Precio Mayoreo" value="<?php echo $datos[0]['preciom']; ?>">
  </div>
  <div class="form-group">
    <label for="in_Imagen">Imagen</label>
    <input type="file" id="in_Imagen" name="imagen" class="form-control">
    <p class="help-block">Solo soporta archivos .jpg, .png y .gif</p>
  </div>
  
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
	<a class="btn btn-danger pull-rigth" href="index.php?id_producto=<?php echo $datos[0]['id_producto']; ?>">Cancelar</a>
	
	<input type="hidden" name="id_producto" value="<?php echo $datos[0]['id_producto']; ?>">
	<input type="hidden" name="sku_ant" value="<?php echo $datos[0]['sku']; ?>">
</form>

<?php
	include('../footer.php');
?>