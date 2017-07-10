<?php
	include('header.php');
?>
	<h1>Contacto</h1>
	<?php
		if(isset($_POST['enviar'])){
			$nombre=$_POST['nombre'];
			$email=$_POST['email'];
			$numero_cliente=$_POST['numero_cliente'];
			$tipo_comentario=$_POST['tipo_comentario'];
			$comentario=$_POST['comentario'];
			$sql='select * from cliente where id_cliente='.$numero_cliente;
			$id_cliente='null';
			echo $sql;
			foreach ($conexion->query($sql) as $fila) {
				if ($numero_cliente!='') {
					$id_cliente=$fila['id_cliente'];
				}
			}
			$conexion->exec("insert into comentario values ('$numero_cliente','$id_cliente','$nombre','$email','$tipo_comentario','$comentario',now())");
		}else{
	?>
	<form action="contacto.php" method="POST">
		<div id="datos">
			<label>Nombre:</label>
			<input type="text" name="nombre" />
			<label>Correo electrónico:</label>
			<input type="email" name="email" /><br />
			<label>Numero de cliente:</label>
			<input type="text" name="no_cliente" />
			<label>Comentario:</label>
			<select name="tipo_comentario">
				<option value="sugerencia">Sugerencia</option>
				<option value="queja">Queja</option>
				<option value="felicitacion">Felicitació</option>
			</select><br />
			<textarea name="comentario"></textarea>	
		</div>
		<div id="boton_enviar">
			<input type="submit" name="enviar" value="Enviar">
		</div>
	</form>
<?php
	}
	include('footer.php');
?>