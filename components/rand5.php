<?php
	echo '<ol>';
	foreach($conexion->query('select * from rand5_view') as $fila) {
		echo '<li><a href=" ver_producto.php?sku='.$fila['sku'].' "> '.$fila['producto'].' </a></li>';
	}
	echo '</ol>';
?>