<?php
	include_once('../abarrotera.class.php');
	if (isset($_GET['id_carrito'])) {
		$paramCarrito['id_carrito']=$_GET['id_carrito'];
		
		$datoCarrito=$abarrotera->consultar("select car.id_carrito,cli.id_cliente,concat(cli.nombre,' ',ifnull(cli.apaterno,''),' ',ifnull(cli.amaterno,'')) as nom_cliente,concat(emp.nombre,' ',ifnull(emp.apaterno,''),' ',ifnull(emp.amaterno,'')) as nom_empleado,suc.sucursal,car.fecha,det.sku,pro.producto,pre.presentacion,det.cantidad,det.precio_unitario,det.descuento_aplicado from carrito car inner join cliente cli on cli.id_cliente = car.id_cliente inner join empleado emp on emp.id_empleado = car.id_empleado inner join sucursal suc on suc.id_sucursal = car.id_sucursal inner join carrito_detalle det on det.id_carrito = car.id_carrito inner join presentacion pre on pre.sku = det.sku inner join producto pro on pro.id_producto = pre.id_producto",$paramCarrito);
		
		$content = ob_get_clean();
		require_once($_SERVER['DOCUMENT_ROOT'].'/abarrotera/vendor/autoload.php');
		$content = '<page>';
			$content = '<h1>Abarrotera Galaxia</h1>';
			$content = '<h3>'.$datoCarrito[0]['sucursal'].'</h3>';
			$content = '<p>'.$datoCarrito[0]['nom_empleado'].'</p>';
			$content = '<p>'.$datoCarrito[0]['nom_cliente'].'</p>';
			$content = '<p>'.$datoCarrito[0]['fecha'].'</p>';

			/*
			$content = '<table>';
				$content = '<tr>';
					$content = '<th>Cantidad</th>';
					$content = '<th>SKU</th>';
					$content = '<th>Precio Unitario</th>';
					$content = '<th>Descuento Aplicado</th>';
					$content = '<th></th>';
				$content = '</tr>';
				
				$total=0;
				foreach ($datoCarrito as $key => $value) {
					$content = '<tr>';
						$content = '<td><input type="text" name="carrito['.$key.']" value="'.$value['cantidad'].'" /></td>';
						$content = '<td>'.$key.'</td>';
						$content = '<td>'.$value['precio_unitario'].'</td>';
						$content = '<td>'.$value['descuento_aplicado'].'</td>';
					$content = '</tr>';
				}
				$content = '<tr>';
					$content ='<th></th>';
					$content ='<th></th>';
					$content = '<th></th>';
					$content = '<th></th>';
					$content = '<th>Total</th>';
					$content = '<th></th>';
					$content = '</tr>';
				$content = '<td>';
					$content = '<th></th>';
					$content = '<th></th>';
					$content = '<th></th>';
					$content = '<th><h3>$'.$total.'</h3></th>';
				$content = '</td>';
			$content = '</table>';
			*/
		$content = '</page>';

		// convert in PDF
		require_once($_SERVER['DOCUMENT_ROOT'].'/abarrotera/vendor/autoload.php');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
		//      $html2pdf->setModeDebug();
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('exemple00.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
?>
