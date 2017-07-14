<?php
	include('header.php');
?>
	<h1>Proveedores</h1>
	<?php
		foreach($conexion->query('select * from proveedor') as $fila) {
	        echo '<img src="image/proveedores/'.$fila['logo'].'" alt="'.$fila['proveedor'].'" />';
	    }
	    $conexion=null;
	?>
<?php
	include('footer.php');
?>