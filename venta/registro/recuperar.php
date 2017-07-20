<?php
	include_once('../abarrotera.class.php');
	if (isset($_POST['enviar'])) {
		$correo=$_POST['correo'];
		$paraCorreo['correo']=$correo;
		$datoCorreo=$abarrotera->consultar('select * from usuario  where correo=:correo',$paraCorreo);
		if (count($datoCorreo)>0) {
			$token=md5(rand(1,1000000).sha1($correo)).md5(md5($datoCorreo[0]['contrasena'])).md5(rand(1,1000000).soundex(crypt('abarrotera','correo')).crypt(rand(1,1000000),'verano'));
			$paraUsuario['llave']=$token;
			$llaveUsuario['correo']=$correo;
			$rowChange=$abarrotera->actualizar('usuario',$paraUsuario,$llaveUsuario);
			if (count($rowChange)) {
				$mensaje='Se envio el correo con las instrucciones';
				$color='success';
				$icon='glyphicon glyphicon-ok';

				/**
				 * This example shows settings to use when sending via Google's Gmail servers.
				 */
				//SMTP needs accurate times, and the PHP time zone MUST be set
				//This should be done in your php.ini, but this is how to do it if you don't have access to that
				date_default_timezone_set('Etc/UTC');
				require '../../lib/phpmailer/PHPMailerAutoload.php';
				//Create a new PHPMailer instance
				$mail = new PHPMailer;
				//Tell PHPMailer to use SMTP
				$mail->isSMTP();
				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				$mail->SMTPDebug = 2;
				//Ask for HTML-friendly debug output
				$mail->Debugoutput = 'html';
				//Set the hostname of the mail server
				$mail->Host = 'smtp.gmail.com';
				// use
				// $mail->Host = gethostbyname('smtp.gmail.com');
				// if your network does not support SMTP over IPv6
				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				$mail->Port = 587;
				//Set the encryption system to use - ssl (deprecated) or tls
				$mail->SMTPSecure = 'tls';
				//Whether to use SMTP authentication
				$mail->SMTPAuth = true;
				//Username to use for SMTP authentication - use full email address for gmail
				$mail->Username = "12030801@itcelaya.edu.mx";
				//Password to use for SMTP authentication
				$mail->Password = "taskforce141";
				//Set who the message is to be sent from
				$mail->setFrom('12030801@itcelaya.edu.mx', 'Valle Rodriguez Julio Cesar');
				//Set an alternative reply-to address
				//$mail->addReplyTo('replyto@example.com', 'First Last');
				//Set who the message is to be sent to
				$mail->addAddress($correo,$correo);
				//Set the subject line
				$mail->Subject = 'Abarrotera Galaxia recuperar Contraseña';
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML('Estimado usuario a continuacion le enciamos una liga que debera presionar para recuperar su cuenta <br /><a href="http://localhost/abarrotera/venta/registro/restablecer.php?llave='.$token.'">Recuperar Constraseña</a>');
				//Replace the plain text body with one created manually
				
				$mail->AltBody = 'This is a plain-text message body';
				//Attach an image file
				//$mail->addAttachment('images/phpmailer_mini.png');
				//send the message, check for errors
				if (!$mail->send()) {
				    echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
				    echo "Message sent!";
				}

			}else{
				$mensaje='Error al enviar el Correo';
				$color='danger';
				$icon='glyphicon glyphicon-info';
			}
		}
	}
	include('../header.php');
?>
<h1>Login</h1>
<form action="recuperar.php" method="POST">
		<div class="form-group">
	    <label for="in_Correo">Correo</label>
	    <input type="email" name="correo" class="form-control" id="in_Correo" placeholder="Correo">
  	</div>
  	<div class="form-group">
	    <button type="submit" name="enviar" value="Enviar" class="btn btn-success">Enviar</button>
  	</div>
</form>
<?php
	include('../footer.php');
?>