<?php
	include("config.php");
?>				
				</div>
			</section>
			<aside>
				<div id="destacados">
					<?php
						include('components/top5.php');
					?>
				</div>
				<div id="nuevos">
					<?php
						include('components/rand5.php');
					?>
				</div>
			</aside>
		</div>
		<footer>
			<div id="menu_inferior">
				<div class="columna_inferior">
					<h1>Sucursales</h1>
					<ul>
						<li><a href="sucursales.php">Sucursales</a></li>
						<li><a href="mapa_ubicacion.php">Mapa de Ubicacion</a></li>
						<li><a href="horario.php">Horario</a>	</li>
					</ul>
				</div>				
				<div class="columna_inferior">
					<h1>Ayuda</h1>
					<ul>
						<li>
							<a href="ayuda.php">Ayuda</a>
						</li>	
					</ul>
				</div>				
				<div class="columna_inferior">
					<h1>Clientes</h1>
					<ul>
						<li><a href="atencion_clientes.php">Atencion al Cliente</a></li>
					</ul>
				</div>
				<div class="columna_inferior">
					<h1>Proveedores</h1>
					<ul>
						<li><a href="proveedores.php">Proveedores</a></li>
					</ul>
				</div>				
				
			</div>
			<div id="redes_sociales">
				<a href="https://www.facebook.com" target="_blank"><img src="http://www.ipermercato-online.it/images/social/facebook.png" height="32" width="32" alt="Facebook" /></a>
				<a href="https://www.twitter.com" target="_blank"><img src="https://www.aciprensa.com/icons/32x32/twitter.png" height="32" width="32" alt="Twitter" />
			</div>
		</footer>
	</div>
</body>
</html>
