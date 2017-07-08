<?php
	include('header.php');
?>
	<h1>Contacto</h1>
	<form action="enviar.php" method="POST">
		<div id="datos">
			<label>Nombre:</label>
			<input type="text" name="nombre" />
			<label>Correo electrónico:</label>
			<input type="email" name="email" /><br />
			<label>Numero de cliente:</label>
			<input type="text" name="nocliente" />
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
	include('footer.php');
?>