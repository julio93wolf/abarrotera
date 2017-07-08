<?php
	echo '<select name="marca">';
	echo '<option value=""></option>';
	foreach($conexion->query('select * from marca order by marca asc') as $fila) {
		echo '<option value="'.$fila['id_marca'].'" >'.$fila['marca'].'</option>';
	}
	echo '</select>';
?>