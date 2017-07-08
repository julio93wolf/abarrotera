<?php
	include('header.php');
?>
	<h1>Promociones</h1>
	<div id="formulario">
		<form action="productos.php" method="GET">
			<select name="categoria">
				<option value=""></option>
				<option value="blancos">Blancos</option>
				<option value="abarrotes">Abarrotes</option>
				<option value="carnes_frias">Carnes Frias</option>
				<option value="dulces">Dulces</option>
			</select>
			<input type="submit" name="enviar" value="Mostrar">
		</form>	
	</div>
	<div id="producto">
		<table>
			<tr>
				<td>
					<div class="oferton">
						<img src="image/productos/7.jpg" width="150px" height="180px">
					</div>
					<h3>Detergente Blanca Nieves </h3>
					<span class="gamage">
						3.785L
					</span><br />
					<span class="p_real">
						$85.00
					</span>
					<span class="descuento">
						-16%
					</span><br />
					<span class="p_descuento">
						$73.30
					</span><br />
					<span class="p_mayoreo">
						$73.30
					</span>
				</td>
				<td>
					<div class="oferton">
						<img src="image/productos/8.jpg" width="150px" height="180px">	
					</div>
					<h3>Detergente Arcoiris</h3>
					<span class="gamage">
						20L
					</span><br />
					<span class="p_real">
						$540.00
					</span>
					<span class="descuento">
						-16%
					</span><br />
					<span class="p_descuento">
						$465.50 c/u
					</span><br />
					<span class="p_mayoreo">
						$73.30
					</span>
				</td>
				<td>
					<div class="oferton">
						<img src="image/productos/9.jpg" width="150px" height="180px">	
					</div>
					<h3> Croquetas Whiskas</h3>
					<span class="gamage">
						20L
					</span><br />
					<span class="p_real">
						$540.00
					</span>
					<span class="descuento">
						-16%
					</span><br />
					<span class="p_descuento">
						$465.50
					</span><br />
					<span class="p_mayoreo">
						$73.30
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<div class="oferton">
						<img src="image/productos/10.jpg" width="150px" height="180px">	
					</div>
					<h3>Croquetas Beneful Adulto</h3>
					<span class="gamage">
						20L
					</span><br />
					<span class="p_real">
						$540.00
					</span>
					<span class="descuento">
						-16%
					</span><br />
					<span class="p_descuento">
						$465.50
					</span><br />
					<span class="p_mayoreo">
						$73.30
					</span>
				</td>
				<td>
					<div class="oferton">
						<img src="image/productos/11.jpg" width="150px" height="180px">	
					</div>
					<h3>Croquetas Beneful Cachorro</h3>
					<span class="gamage">
						20L
					</span><br />
					<span class="p_real">
						$540.00
					</span>
					<span class="descuento">
						-16%
					</span><br />
					<span class="p_descuento">
						$465.50
					</span><br />
					<span class="p_mayoreo">
						$73.30
					</span>
				</td>
				<td>
					<div class="oferton">
						<img src="image/productos/12.jpg" width="150px" height="180px">	
					</div>
					<h3>Arroz Grueso Schettino</h3>
					<span class="gamage">
						20L
					</span><br />
					<span class="p_real">
						$540.00
					</span>
					<span class="descuento">
						-16%
					</span><br />
					<span class="p_descuento">
						$465.50
					</span><br />
					<span class="p_mayoreo">
						$73.30
					</span>
				</td>
			</tr>
		</table>
	</div>
<?php
	include('footer.php');
?>