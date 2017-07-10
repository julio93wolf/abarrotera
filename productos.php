<?php
	include('header.php');
?>
	<h1>Productos</h1>
	<div id="formulario">
		<form action="productos.php" method="GET">
			<?php
				include('components/categoria.php');
				include('components/marca.php');
			?>
			<input type="submit" name="ver" value="Ver">
		</form>
	</div>
	<div id="producto">
		<?php
			$where="";
			if(isset($_GET['categoria'])){
				if($_GET['categoria']!=''){
					if(isset($_GET['marca'])){
						if($_GET['marca']!=''){
							$where= 'where id_categoria= '.$_GET['categoria'].' and id_marca= '.$_GET['marca'];
						}
					}else{
						$where= 'where id_categoria= '.$_GET['categoria'];
					}	
				}
			}
			if(isset($_GET['marca'])){
				if($_GET['marca']!=''){
					if(isset($_GET['categoria'])){
						if($_GET['categoria']!=''){
							$where= 'where id_categoria= '.$_GET['categoria'].' and id_marca= '.$_GET['marca'];
						}
					}else{
						$where= 'where id_marca= '.$_GET['marca'];
					}	
				}
			}
			echo '<table>';
			$i=0;
			$query_exec = 'select * from vw_productos '.$where;
			foreach($conexion->query($query_exec) as $fila) {
				if($i<=0){
		        	echo "<tr>";
		        }
		        echo "<td>";
		        if($fila['descuento']>0){
		        	echo '<div class="oferton"><img src="image/presentaciones/'.$fila['imagen'].'" width="160px" height="160px"></div>';							
			        echo '<h3>'.$fila['producto'].'</h3>';
			        echo '<span class="gamage">'.$fila['presentacion'].' '.$fila['unidad_medida'].'</span><br />';
			        echo '<span class="p_real">$'.$fila['preciou'].'</span>';
			        echo '<span class="descuento"> -16%</span><br />';
			        echo '<span class="p_descuento">Mayoreo: '.$fila['cantidadm'].'</span><br />';
			        echo '<span class="p_mayoreo">$'.$fila['preciom'].'</span>';
		        }else{
		        	echo '<div class="normal"><img src="image/presentaciones/'.$fila['imagen'].'" width="160px" height="160px"></div>';							
			        echo '<h3>'.$fila['producto'].'</h3>';
			        echo '<span class="gamage">'.$fila['presentacion'].' '.$fila['unidad_medida'].'</span><br />';
			        echo '<span class="p_real">$'.$fila['preciou'].'</span>';
			        echo '<span class="descuento"> -16%</span><br />';
			        echo '<span class="p_descuento">Mayoreo: '.$fila['cantidadm'].'</span><br />';
			        echo '<span class="p_mayoreo">$'.$fila['preciom'].'</span>';
		        }
		        echo "</td>";
		        $i++;
		        if($i>=4){
		        	echo "</tr>";
		        	$i=0;
		        }
		    }
		    $conexion=null;
			echo '</table>';
		?>
	</div>
<?php
	include('footer.php');
?>