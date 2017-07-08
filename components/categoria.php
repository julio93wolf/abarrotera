<?php
	echo '<select name="categoria">';
	echo '<option value=""></option>';
	foreach($conexion->query('select * from categoria order by categoria asc') as $fila) {
		echo '<option value="'.$fila['id_categoria'].'" >'.$fila['categoria'].'</option>';
	}
	echo '</select>';
?>