<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		if (isset($_FILES['logo']['name'])) {
			$origen=$_FILES['logo']['tmp_name'];
			$destino='../../image/proveedores/'.$_FILES['logo']['name'];
			if($abarrotera->validarImagen($_FILES['logo'])){
				if(move_uploaded_file($origen,$destino)){
					$parametros['proveedor']=$_POST['proveedor'];
					$parametros['logo']=$_FILES['logo']['name'];
					$abarrotera->insertar('proveedor',$parametros);	
					$mensaje='Se inserto el proveedor';
					$color='success';
					$icon='glyphicon glyphicon-ok';
					if($_POST['enviar']=="Guardar y Regresar"){
						include('index.php');
						die();
					}
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
		}
	}
		include('../header.php');
?>
<h1>Nuevo Proveedor</h1>

<form action="nuevo.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="in_proveedor">Proveedor</label>
	    <input type="text" name="proveedor" class="form-control" id="in_proveedor" placeholder="Proveedor">
  	</div>
  	<div class="form-group">
	    <label for="in_logo">Logotipo</label>
	    <input type="file" name="logo" class="form-control" id="in_logo" placeholder="Logotipo">
  	</div>
	<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
	<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-info">Guardar y regresar</button>
</form>

<?php
	include('../footer.php');
?>